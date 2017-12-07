<?php
declare(strict_types=1);

function getExerciseFilename(string $pageExerciseFile): string {
    $filePieces = pathinfo($pageExerciseFile);
    $pageExerciseFile = "{$filePieces['filename']}.{$filePieces['extension']}";

    return preg_replace('/\d+_/', '', $pageExerciseFile);
}

function getExerciseFilepath(string $pageExerciseFile): string {
    return 'src/exercises/' . getExerciseFilename($pageExerciseFile);
}

function displayExerciseLocationNotice(string $pageExerciseFile): string {

    $fileLocation = getExerciseFilepath($pageExerciseFile);

    $notice = <<<html
        <div class="alert alert-secondary" role="alert">
            The code for this exercise is written in the following file:<br>
            <strong>{$fileLocation}</strong>
        </div>
html;

    return $notice;
}