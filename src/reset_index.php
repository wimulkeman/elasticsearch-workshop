<?php
require_once 'es_client.php';

resetEsIndex();

header("Location: /?message=Index successfully reset");
