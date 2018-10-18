<h2>3: What just happened - debugging</h2>

<?php echo displayExerciseLocationNotice(__FILE__); ?>

<p>
    Elasticsearch is a powerful framework, but it may also sometimes
    do something completely unexpected. For those moments knowing some
    debug methods can come in handy.
</p>

<h3>3.1: Tokenizing</h3>
<p>
    Tokenizing is the part of Elasticsearch that handles incoming
    search queries, and decides how to cut them up for searching
    internally.
</p>
<p>
    They way a search word is cut up, can differ quiet a lot per
    tokenizer. Lucky for us Elasticsearch provides a way to debug
    that tokenizer.
</p>
<p>
    Open up the console and fiddle around with the standard
    analyzer, or another analyzer, and see the difference
    in the way a search term is analyzed by the tokenizer.
</p>
<p>
    <a href="<?php echo getenv('KIBANA_URL'); ?>/app/kibana#/dev_tools/console?load_from=https://www.elastic.co/guide/en/elasticsearch/reference/6.0/snippets/_explain_analyze/1.json" target="_blank">
        Start the console
    </a>
</p>
<?php
echo getHelpResources(
    [
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/6.0/_explain_analyze.html',
            'title' => 'Elasticsearch docs: Explain Analyse'
        ],
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/6.0/indices-analyze.html',
            'title' => 'Elasticsearch docs: Analyse'
        ],
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/6.0/analysis-analyzers.html',
            'title' => 'Elasticsearch docs: Analysers'
        ]
    ]
);
?>

<h3>3.2: Scoring</h3>
<p>
    It may come in handy to know why Elasticsearch is calculating
    its score, for the score determines which document is presented
    first.
</p>
<p>
    To debug this, Elasticsearch offers an option called <strong>explain</strong>.
    Try implementing it, and search for <strong>lexmark</strong>
    using a match query afterwards. You should see how Elasticsearch
    made its calculations.
</p>
<p>
<?php
    $modalId = 'singleMatchWordModal';

    echo getQueryForm($modalId, getExerciseFilename(__FILE__));
    echo getResultModal($modalId);
?>
</p>
<?php
echo getHelpResources(
    [
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/6.0/search-request-explain.html',
            'title' => 'Elasticsearch docs: Explain'
        ]
    ]
);
?>

<p>
    Now you know how crack open some of that Elasticsearch internals,
    you have become a bit more of an Elasticsearch developer!<br>
    <?php echo getNextExercisePageHref(__FILE__); ?>
</p>
