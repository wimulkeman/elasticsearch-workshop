<h2>5: Highlighting match phrase</h2>

<?php echo displayExerciseLocationNotice(__FILE__); ?>

<p>
    We all know Google and the way they show their results. One
    fancy aspect of that is the way they show what part of the result
    was a indication to show you the document.
</p>

<h3>The exercise</h3>
<p>
    In this exercise we are going to write a <strong>highlighting</strong>
    functionality for Elasticsearch which will show us which part of a text
    was matched by the query.
</p>

<h3>5.1: Writing our first highlighter</h3>
<p>
    Try writing your first highlighter using the default
    highlighter from Elasticsearch. When you're ready, try searching
    for <strong>lexmark</strong>.
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
<p>
    If everything went as planned, you should see the work written
    cursive in the description column. When the word was found on
    multiple places, the description now contains a ... as a text
    separator.
</p>

<h3>5.2: Make it shine</h3>
<p>
    But that ain't pretty! We better do something about that.
    Update your highlight script to wrap the word found in a
    <strong>strong</strong> tag.
</p>
<?php
$modalId = 'defaultStrongHighlighter';

echo getQueryForm($modalId, getExerciseFilename(__FILE__));
echo getResultModal($modalId);
?>
<p>
    That looks better already.
</p>

<h3>5.3: But here comes the typos</h3>
<p>
    Wait, we made it match on exact words! What about typo support?
    Will that also work? Well, the only way to be sure is to try it out.
    Add a fuzziness to the match part of the query, and try searching
    for <strong>lxemark</strong>.
</p>
<?php
$modalId = 'defaultStrongWithFuzzinessHighlighter';

echo getQueryForm($modalId, getExerciseFilename(__FILE__));
echo getResultModal($modalId);
?>
<p>
    That works also! Is it not awesome? Everything is awesome!<br>
    <?php echo getNextExercisePageHref(__FILE__); ?>
</p>

