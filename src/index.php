<?php
include_once 'functions.php';

$defaultPage = 'home.php';

$exercisePages = [];
$exercises = array_slice(scandir('exercises/'), 2);
$pages = array_slice(scandir('pages/'), 2);
foreach ($pages as $page) {
    if ($page === 'home.php') {
        continue;
    }

    $exercisePage = getExerciseFilename($page);
    $title = str_replace('.php', '', $exercisePage);

    $exercisePages[$page] = [
        'number' => getExerciseNumberFromExercisePage($page),
        'title' => str_replace('_', ' ', ucfirst($title)),
    ];

    if (!in_array($exercisePage, $exercises)) {
        $exercisePages[$page]['disabled'] = true;
    }
}

$pageRequest = pathinfo(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$page = $defaultPage;
if (isset($pageRequest['basename'])
    && isset($exercisePages[$pageRequest['basename']])
) {
    $page = $pageRequest['basename'];
    $exercisePages[$page]['active'] = true;
}

ob_start();
include "pages/{$page}";
$pageContent = ob_get_clean();

include "layout/base.php";