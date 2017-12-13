<?php
include_once "../es_client.php";

$query = $_GET['query'];

# --------------------------
# Edit between these lines
# --------------------------

// Your start code
//$body = [
//    "suggest" => []
//];

$body = [
    "suggest" => []
];

# --------------------------
# End of the edit
# --------------------------

header('Content-Type: application/json');

try {
    $results = doEsRSearchRequest($body);
} catch (\Elasticsearch\Common\Exceptions\BadRequest400Exception $exception) {
    echo json_encode(['Oh no, something went wrong while submitting your query. Check the syntax']);
    return;
}

$suggestions = array_column(current($results['suggest'])[0]['options'], 'text');

echo json_encode($suggestions);