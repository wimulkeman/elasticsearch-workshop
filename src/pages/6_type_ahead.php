<h2>6: Type ahead</h2>

<?php echo displayExerciseLocationNotice(__FILE__); ?>

<p>
    One fancy aspect of Elasticsearch is the type ahead functionality.
</p>

<h3>6.1: We fill in each others words</h3>
<p>
    Try implementing the type ahead functionality in Elasticsearch.
    When finished, you should receive a list with options when you
    start typing in the field below. When you start typing
    <strong>lexmark</strong> or <strong>canon</strong>
    you should see some results.
</p>
<p>
    <div>
        <input type="text"
               class="typeahead"
               data-provide="typeahead"
               autocomplete="off"
               placeholder="Bash that keyboard"
        >
    </div>
</p>
<?php
echo getHelpResources(
    [
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/6.0/search-suggesters-completion.html#querying',
            'title' => 'Elasticsearch docs: Suggesters Completion'
        ]
    ]
);
?>

<h3>How does it work</h3>
<p>
    For this exercise, we use a completion suggester. This means
    that we enter the first part of a phrase, and Elasticsearch
    provides us with options with phrases that match that start.
</p>
<p>
    In the current implementation you need to type the exact word
    to match a phrase.
</p>

<h3>6.2: Bonus: I beg your pardon?</h3>
<p>
    We learned in a previous example how to implement fuzziness
    to correct wrongly phrased search queries. Try implementing
    fuzziness into this example.
</p>
<p>
    Now try searching again, but now with some incorrect names.
</p>
<p>
<div>
    <input type="text"
           class="typeahead"
           data-provide="typeahead"
           autocomplete="off"
           placeholder="Bash that keyboard"
    >
</div>
</p>
<?php
echo getHelpResources(
    [
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/6.0/search-suggesters-completion.html#fuzzy',
            'title' => 'Elasticsearch docs: Suggesters Completion - fuzziness'
        ]
    ]
);
?>

<p>
    Wow, if we would mix these exercises together, we could create that
    Google feeling on our own websites! Ain't that amazing!<br>
    <?php echo getNextExercisePageHref(__FILE__); ?>
</p>

