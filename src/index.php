<?php
$defaultPage = 'home.php';

$exercisePages = [];
$exercises = array_slice(scandir('exercises/'), 2);
$pages = array_slice(scandir('pages/'), 2);
foreach ($pages as $page) {
    if ($page === 'home.php') {
        continue;
    }

    $exercisePage = preg_replace('/\d+_/', '', $page);
    $title = str_replace('.php', '', $exercisePage);

    preg_match('/\d+/', $page, $exerciseNumber);

    $exercisePages[$page] = [
        'number' => $exerciseNumber[0],
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

$pageContent = file_get_contents("pages/{$page}");

include "layout/base.php";