<?php
declare(strict_types=1);

function getExerciseFilename(string $pageExerciseFile): string
{
    $filePieces = pathinfo($pageExerciseFile);
    $pageExerciseFile = "{$filePieces['filename']}.{$filePieces['extension']}";

    return preg_replace('/\d+_/', '', $pageExerciseFile);
}

function getExerciseFilepath(string $pageExerciseFile): string
{
    return 'src/exercises/' . getExerciseFilename($pageExerciseFile);
}

function getExerciseNumberFromExercisePage(string $pageExerciseFile): int
{
    preg_match('/\d+/', $pageExerciseFile, $exerciseNumber);

    return (int) $exerciseNumber[0];
}

function displayExerciseLocationNotice(string $pageExerciseFile): string
{

    $fileLocation = getExerciseFilepath($pageExerciseFile);

    $notice = <<<html
        <div class="alert alert-secondary" role="alert">
            The code for this exercise is written in the following file:<br>
            <strong>{$fileLocation}</strong>
        </div>
html;

    return $notice;
}

function getResultModal(string $modalId): string
{
    $modal = <<<html
        <div class="modal fade bd-example-modal-lg" id="{$modalId}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Result</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <b>Loading response...</b>
                </div>
            </div>
        </div>
    </div>
html;

    return $modal;
}

function getQueryForm(string $modalId, string $actionTarget): string
{
    $form = <<<html
        <form class="form-inline modal-result-filler"
          data-async
          data-target="#{$modalId}"
          action="/exercises/{$actionTarget}"
          method="GET"
        >
            <label class="sr-only" for="singleMatchWord">Query</label>
            <input type="text" name="query" class="form-control mb-2 mr-sm-2 mb-sm-0" id="singleMatchWord" placeholder="Query">
    
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
html;

    return $form;
}

function getResultButton(string $buttonText, string $modalId, string $actionTarget): string
{
    $form = <<<html
        <button type="button"
                class="btn btn-primary modal-result-click"
                data-target="#{$modalId}"
                data-action="/exercises/{$actionTarget}"
                data-method="GET"
        >{$buttonText}</button>
html;

    return $form;
}

function getHelpResources(array $resources): string
{
    $links = '';
    foreach ($resources as $resource) {
        $links .= "<li><a href='{$resource['url']}' target='_blank'>{$resource['title']}</a></li>";
    }

    $resourceHtml = <<<html
        <h3>Help...</h3>
        <p>
            Are you stuck? Try these resources:
            <ul>
                {$links}
            </ul>
        </p>
html;

    return $resourceHtml;
}

function getNextExercisePageHref(string $currentExercisePage): string
{
    $currentNumber = getExerciseNumberFromExercisePage($currentExercisePage);
    $nextNumber = $currentNumber + 1;

    $nextExercisePage = glob("pages/{$nextNumber}_*");

    if (!isset($nextExercisePage[0])) {
        return '';
    }

    $nextPage = str_replace('pages', '', $nextExercisePage[0]);
    $href = $nextPage;

    $exercisePage = getExerciseFilename($nextExercisePage[0]);
    if (!is_file("exercises/{$exercisePage}")) {
        return '';
    }

    return "Its time for the <a href='{$href}'>next exercise</a>, or to take a break.";
}

function getKibanaUrl() {
    return 'http://localhost:5601';
}

function loadKibanaDevToolsUrl()
{
    return getKibanaUrl().'/app/kibana#/dev_tools/console';
}

function loadKibana(string $linkText = 'Kibana') {
    return '<a target="_blank" href="'.getKibanaUrl().'">'.$linkText.'</a>';
}

function loadKibanaDevTools(string $linkText = 'Kibana > Dev Tools')
{
    return loadJsonFileInKibana('blank_console_input.json', $linkText);
}

function loadJsonFileInKibana(string $jsonFile, string $linkText = 'Kibana') {
    if (empty($jsonFile)) {
        throw new \UnexpectedValueException($jsonFile);
    }

    return '<a target="_blank" href="'.loadKibanaDevToolsUrl().'?load_from=http://localhost/resources/json/'.$jsonFile.'">'.$linkText.'</a>';
}
