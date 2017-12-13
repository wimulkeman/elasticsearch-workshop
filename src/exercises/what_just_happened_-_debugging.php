<?php
include_once "../es_client.php";

$query = $_GET['query'];

# --------------------------
# Edit between these lines
# --------------------------

// Your start code
//$body = [
//    "query" => [
//        "match" => ["name" => $query]
//    ]
//];

$body = [
    "query" => [
        "match" => ["name" => $query]
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
                <th>Name</th>
                <th>Explanation</th>
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
    $explanation = print_r($hit['_explanation'], true);

    echo <<<html
        <tr>
            <td>{$hit['_score']}</td>
            <td>{$record['name']}</td>
            <td>
                <pre>{$explanation}</pre>
            </td>
        </tr>
html;

}

echo '</tbody>
</table>';
