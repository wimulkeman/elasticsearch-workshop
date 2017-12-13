<?php
declare(strict_types=1);

include_once 'vendor/autoload.php';

$esClientBuilder = new \Elasticsearch\ClientBuilder();
$esClientBuilder->setHosts(['elasticsearch:9200']);

$esClient = $esClientBuilder->build();
$esIndexes = $esClient->indices();

// type: keyword > replacedment of type: string && index: not_analyzed
// type: text > replacement of type: string && index: analyzed

$esIndexConfig = [
    'index' => 'webstores',
    'type' => 'workshop',
    'body' => [
        'settings' => [
            'number_of_shards' => 1,
            'number_of_replicas' => 0,
            "index" => [
                "analysis" => [
                    "filter" => [
                        "my_synonyms_filter" => [
                            "type" => "synonym_graph",
                            "synonyms" => [
                                'apple, microsoft'
                            ]
                        ]
                    ],
                    "analyzer" => [
                        "my_synonyms" => [
                            "tokenizer" => "standard",
                            "filter" => [
                                "lowercase",
                                "my_synonyms_filter"
                            ]
                        ]
                    ]
                ]
            ]
        ],
        'mappings' => [
            'workshop' => [
                'properties' => [
                    'sku' => [
                        'type' => 'text'
                    ],
                    'name' => [
                        'type' => 'text'
                    ],
                    'description' => [
                        'type' => 'text'
                    ],
                    'name_suggest' => [
                        'type' => 'completion'
                    ],
                    'name_synonyms' => [
                        'type' => 'text',
                        "analyzer" => "my_synonyms"
                    ],
                    'family' => [
                        'type' => 'keyword'
                    ],
                    'categories' => [
                        'type' => 'keyword'
                    ],
                    'family_wrongly_mapped' => [
                        'type' => 'text',
                        'fielddata' => true
                    ]
                ]
            ]
        ]
    ]
];

function createEsIndex() {
    global $esIndexes;
    global $esIndexConfig;

    $esIndexes->create(array_intersect_key(
        $esIndexConfig,
        array_flip(['index', 'body'])
    ));
}

function addDefaultDataToEsIndex() {
    global $esClient;
    global $esIndexConfig;

    $dataFile = fopen('resources/products.csv', 'r');
    $headers = ['sku', 'categories', 'family', 'name', 'description'];

    while (($columns = fgetcsv($dataFile, 1600, ';'))) {
        if (count($headers) !== count($columns)) {
            continue;
        }

        $data = array_combine($headers, $columns);

        if ($data['sku'] === 'sku') {
            continue;
        }

        $data['categories'] = explode(',', $data['categories']);
        $data['categories'] = str_replace('_', ' ', $data['categories']);

        $data['family'] = str_replace('_', ' ', $data['family']);
        $data['family_wrongly_mapped'] = $data['family'];

        $data['description'] = strip_tags($data['description']);

        $data['name_suggest'] = $data['name'];
        $data['name_synonyms'] = $data['name'];

        try {
            $esClient->index(
                [
                    'index' => $esIndexConfig['index'],
                    'type' => $esIndexConfig['type'],
                    'id' => $data['sku'],
                    'body' => $data
                ]
            );
        } catch (\Exception $exception) {

        }
    }

    fclose($dataFile);
}

function deleteEsIndex() {
    global $esIndexes;
    global $esIndexConfig;

    if (esIndexExists()) {
        $esIndexes->delete(array_intersect_key(
            $esIndexConfig,
            array_flip(['index'])
        ));
    }
}

function esIndexExists() {
    global $esIndexes;
    global $esIndexConfig;

    return $esIndexes->exists(array_intersect_key(
        $esIndexConfig,
        array_flip(['index'])
    ));
}

function resetEsIndex() {
    if (esIndexExists()) {
        deleteEsIndex();
    }

    createEsIndex();
    addDefaultDataToEsIndex();
}

function buildEsRequest(array $body): array {
    global $esIndexConfig;

    return [
        'index' => $esIndexConfig['index'],
        'type' => $esIndexConfig['type'],
        'body' => $body
    ];
}

function doEsRSearchRequest(array $body): array {
    global $esClient;

    $request = buildEsRequest($body);

    return $esClient->search($request);
}

if (!esIndexExists()) {
    createEsIndex();
    addDefaultDataToEsIndex();
}
