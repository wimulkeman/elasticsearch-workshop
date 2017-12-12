<h2>5: Highlighting match phrase</h2>

<?php echo displayExerciseLocationNotice(__FILE__); ?>

<p>
    We all know Google and the way they show there results. One
    fancy aspect of that is the way they show what part of the result
    was a indication to show you the document.
</p>

<h3>The exercise</h3>
<p>
    In this exercise we are going to write a <strong>highlighting</strong>
    functionality for Elasticsearch which will show us which part of a text
    was matched by the query.
</p>

<h3>1.1: Writing our first highlighter</h3>
<p>
    Try writing your first highlighter using the default
    highlighter from Elasticsearch.
</p>
<p>
    <?php
    $modalId = 'defaultHighlighter';

    echo getQueryForm($modalId, getExerciseFilename(__FILE__));
    echo getResultModal($modalId);
    ?>
</p>
<?php
echo getHelpResources(
    [
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/6.0/search-request-highlighting.html',
            'title' => 'Elasticsearch docs: Highlighting'
        ]
    ]
);
?>