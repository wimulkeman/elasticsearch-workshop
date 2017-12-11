<?php
include_once "../es_client.php";

$query = $_GET['query'];

# --------------------------
# Edit between these lines
# --------------------------

// Your start code
//$body = [
//    "query" => [
//        'match' => [
//            'name' => [
//                'query' => $query
//            ]
//        ]
//    ]
//];

$body = [
    "query" => [
        'match' => [
            'name' => [
                'query' => $query
            ]
        ]
    ]
];

# --------------------------
# End of the edit
# --------------------------

try {
    $results = doEsRSearchRequest($body);
} catch (\Elasticsearch\Common\Exceptions\BadRequest400Exception $exception) {
    echo 'Oh boy, seems like your request could not be processed correctly. Check if your syntax is valid.';
    return;
}

$totalHits = (int) $results['hits']['total'];

echo <<<html
    <table class="table">
        <tbody>
            <tr>
                <td>Number of results</td>
                <td>{$totalHits}</td>
            </tr>
        </tbody>
    </table>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Match&nbsp;score</th>
                <th>SKU</th>
                <th>Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
html;

if ($totalHits === 0) {
    echo <<<html
            <tr>
                <td colspan="4">O no, no results where found...</td>
            </tr>
        </tbody>
    </table>
html;

    return;
}

foreach ($results['hits']['hits'] as $hit) {
    $record = $hit['_source'];

    $description = mb_strcut($record['description'], 0, 50);

    echo <<<html
        <tr>
            <td>{$hit['_score']}</td>
            <td>{$record['sku']}</td>
            <td>{$record['name']}</td>
            <td>{$description}</td>
        </tr>
html;

}

echo '</tbody>
</table>';
