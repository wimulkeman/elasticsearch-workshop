<?php
declare(strict_types=1);

include_once 'vendor/autoload.php';

$esClientBuilder = new \Elasticsearch\ClientBuilder();
$esClientBuilder->setHosts(['elasticsearch:9200']);

$esClient = $esClientBuilder->build();
$esIndexes = $esClient->indices();

$esIndexConfig = [
    'index' => 'webstores',
    'type' => 'workshop',
    'body' => [
        'settings' => [
            'number_of_shards' => 1,
            'number_of_replicas' => 0
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
                    'categories' => [
                        'type' => 'text',
                        'index' => false
                    ],
                    'family' => [
                        'type' => 'text',
                        'index' => false
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

        $data['description'] = strip_tags($data['description']);

        $data['name_suggest'] = $data['name'];

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
