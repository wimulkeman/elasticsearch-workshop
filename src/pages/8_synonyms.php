<h2>8: Synonyms</h2>

<?php echo displayExerciseLocationNotice(__FILE__); ?>

<h3>8.1: Yeah, that's what I meant</h3>
<p>
    Sometimes you say something, but you mean something else.
    Because hey, we all mean Microsoft when we are talking about
    Apple, right? No? Well for the sake of this example we do.
    Try searching for <strong>Apple</strong>.
</p>
<p>
<?php
    $modalId = 'appleSynonyms';

    echo getQueryForm($modalId, getExerciseFilename(__FILE__));
    echo getResultModal($modalId);
?>
</p>
<p>
    You see, you really meant <strong>Microsoft</strong> after all!
    Right! Right? No? Alright then.
</p>
<p>
    For this we used something in the mapping of our fields called
    <strong>synonyms</strong>. That enables us to connect words
    to each other. That way, if someone search for one word, Elasticsearch
    will also look for matches on its synonyms.
</p>
<p>
    This can be helpful when your know your customers meant the same
    thing, but called it something else, like a oil drum and a oil barrel.
</p>
<?php
echo getHelpResources(
    [
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/guide/master/using-synonyms.html',
            'title' => 'Elasticsearch docs: Using synonyms'
        ],
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/6.1/query-dsl-match-query.html#query-dsl-match-query-synonyms',
            'title' => 'Elasticsearch docs: Match Query - synonyms'
        ]
    ]
);
?>

<h3>Wow, what happened</h3>
<p>
    Synonyms can be a powerful concept, but how does it work? Synonyms
    are a analyser that is set on a field. Because it is a analyzer, the
    synonyms are defined when you create the mapping for your index.
</p>
<p>
    Mappings are done before you populate your index with documents.
</p>

<p>
    <?php echo getNextExercisePageHref(__FILE__); ?>
</p>