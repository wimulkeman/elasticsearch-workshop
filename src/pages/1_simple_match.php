<h2>1: Simple match</h2>

<?php echo displayExerciseLocationNotice(__FILE__); ?>

<p>
    Let us start with what Elasticsearch is meant for. A
    search, because Elasticsearch is for, you know, for search,
</p>

<h3>The exercise</h3>
<p>
    In this exercise we are going to write a <strong>match</strong>
    query.
</p>

<h3>1.1 Single word match</h3>
<p>
    We're starting easy one over here. Fill in one word in this form
    and submit it. It will become available in the code within the
    exercise defined at the top of this page as the variable <strong>$query</strong>.

    <pre><code class="php">$query = $_GET['query'];</code></pre>
</p>
<p>
    For now write a match on the field <strong>name</strong>. If
    you want to know more about the fields and the data available,
    check <a href="http://localhost:5601" target="_blank">Kibana</a>.
</p>
<p>
    <?php
        $modalId = 'singleMatchWordModal';

        echo getQueryForm($modalId, getExerciseFilename(__FILE__));
        echo getResultModal($modalId);
    ?>
</p>
<p>
    You could use for example <strong>lexmark</strong>.
</p>
<?php
echo getHelpResources(
    [
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/6.0/query-dsl-match-query.html#query-dsl-match-query',
            'title' => 'Elasticsearch docs: match query'
        ],
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/_search_operations.html#_match_query',
            'title' => 'Elasticsearch php client docs: match query'
        ]
    ]
);
?>

<h3>1.2 But does it support typos</h3>
<p>
    What would happen if you made a typo? Lets try it by entering
    <strong>lxemark</strong>.
</p>
<p>
    <?php
    $modalId = 'invalidMatchWord';

    echo getQueryForm($modalId, getExerciseFilename(__FILE__));
    echo getResultModal($modalId);
    ?>
</p>
<p>
    In the regular matching query, Elasticsearch does not support
    typos. For that we will need something called <strong>fuzziness</strong>.
    But hold your horses. We will cover that in another exercise. For
    now its back to just matching.
</p>

<h3>1.3 Double word match</h3>
<p>
    Let us make it a bit tougher for this one. Now enter two words
    and see what happen.
</p>
<p>
    <?php
    $modalId = 'doubleMatchWordModal';

    echo getQueryForm($modalId, getExerciseFilename(__FILE__));
    echo getResultModal($modalId);
    ?>
</p>
<p>
    See what happens when you enter <strong>lexmark printer</strong>
    or go crazy, and try <strong>lexmark printer scanner</strong>.<br>
    While doing that, pay extra attention to the number of results found.
</p>
<p>
    You will see that the number of results found is getting higher.
    This is because Elasticsearch looks for matches for any of the
    words, which results in the combined search of the separated 3 words.
</p>

<h3>1.4 Matching both words</h3>
<p>
    Try to match both words <strong>lexmark</strong> and <strong>printer</strong>.
    The results count should ne lower then at 1.3.
</p>
<p>
    <?php
    $modalId = 'matchBothWords';

    echo getQueryForm($modalId, getExerciseFilename(__FILE__));
    echo getResultModal($modalId);
    ?>
</p>
<?php
echo getHelpResources(
    [
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/6.0/query-dsl-bool-query.html#query-dsl-bool-query',
            'title' => 'Elasticsearch docs: Bool Query'
        ]
    ]
);
?>

<h3>1.5 Matching only one of the words</h3>
<p>
    Now try to match only one of words <strong>lexmark</strong> or <strong>webcam</strong>.
    The results count should ne lower then at 1.3.
</p>
<p>
    <?php
    $modalId = 'matchOneOfTheWords';

    echo getQueryForm($modalId, getExerciseFilename(__FILE__));
    echo getResultModal($modalId);
    ?>
</p>

<h3>1.6 Start searching that description</h3>
<p>
    Finally its time to extend our search battleground fields.
    Try adding the <strong>description</strong> field as a additional
    search field so Elasticsearch is searching in both the <strong>name</strong>
    and the <strong>description</strong> fields.
</p>
<p>
    <?php
    $modalId = 'matchOneOfTheWords';

    echo getQueryForm($modalId, getExerciseFilename(__FILE__));
    echo getResultModal($modalId);
    ?>
</p>
<?php
echo getHelpResources(
    [
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/6.0/query-dsl-match-query.html#query-dsl-match-query',
            'title' => 'Elasticsearch docs: Multi-match'
        ]
    ]
);
?>

<h3>1.7 Mixing it all up</h3>
<p>
    Now we know how to search in multiple fields, and how to
    make sure our search terms are both present. Try to combine those
    and make Elasticsearch search for <strong>lexmark</strong> in the
    <strong>name</strong> field, and for <strong>laser</strong> in the
    <strong>description</strong> field.
</p>
<p>
    <?php
    $modalId = 'combiningFieldsAndWords';

    echo getQueryForm($modalId, getExerciseFilename(__FILE__));
    echo getResultModal($modalId);
    ?>
</p>

<h3>1.8 Bonus: Gotta catch them all</h3>
<p>
    I hear you think, I have this case where I just need all those results. Do I need
    to query my own database for that?<br>
    Well, you don't &#9786;! Elasticsearch provides a option called <strong>match all</strong>.
    It returns all the results in your index. Ain't that sweet of Elasticsearch!
</p>
<p>
    Now go and catch them all!
</p>
<div class="alert alert-warning" role="alert">
    Due to an converting problem with the Elasticsearch PHP client, you can't just define
    a empty param, it will throw an error! But there is a solution! Use <strong>(object) []</strong>
    on the place of your empty param, and no one will know about it.
</div>
<p>
    <?php
    $modalId = 'matchAll';

    echo getQueryForm($modalId, getExerciseFilename(__FILE__));
    echo getResultModal($modalId);
    ?>
</p>
<?php
echo getHelpResources(
    [
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/6.0/query-dsl-match-all-query.html',
            'title' => 'Elasticsearch docs: Match all query'
        ]
    ]
);
?>

<p>
    You have unlocked a potentially very powerful part of Elasticsearch. Its amazing!<br>
    <?php echo getNextExercisePageHref(__FILE__); ?>
</p>