<?php
include_once "../es_client.php";

$query = isset($_GET['query']) ? $_GET['query'] : '' ;

# --------------------------
# Edit between these lines
# --------------------------

// Your start code
//$body = [
//    'size' => 0,
//    "aggs" => []
//];

$body = [
    'size' => 0,
    "aggs" => []
];

# --------------------------
# End of the edit
# --------------------------

//try {
$results = doEsRSearchRequest($body);
//} catch (\Elasticsearch\Common\Exceptions\BadRequest400Exception $exception) {
//    echo 'Oh boy, seems like your request could not be processed correctly. Check if your syntax is valid.';
//    return;
//}

$aggregationRows = '';
foreach ($results['aggregations'] as $name => $aggregation) {
    $aggregationRows .= <<<html
        <tr>
            <th colspan="2">Aggregation: {$name}</th>
        </tr>
html;

    foreach ($aggregation['buckets'] as $bucket) {
        $aggregationRows .= <<<html
            <tr>
                <td>{$bucket['key']}</td>
                <td>{$bucket['doc_count']}</td>
            </tr>
html;
    }
}

echo <<<html
    <table class="table table-striped">
        {$aggregationRows}
    </table>
html;
