<?php
include_once "../es_client.php";

//$matchQuery = $_GET['match'];

# --------------------------
# Edit between these lines
# --------------------------

$query = [
    "query" => []
];

# --------------------------

$results = doEsRSearchRequest($query);
var_dump($results);