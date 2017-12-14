<h2>7: Aggregations</h2>

<?php echo displayExerciseLocationNotice(__FILE__); ?>

<h3>What are aggregations</h3>
<p>
    Aggregations are the backbone of the filters we create using
    Elasticsearch. How sweet is that? But what are they, and how
    do they work?
</p>

<h3>7.1: Define them before we kick the bucket</h3>
<p>
    <strong>Aggregations</strong> already says whats happening, it combines the
    results of your documents and puts them together.
</p>
<p>
    When it combines those documents, it puts them, based on there
    corresponding value, together in so called <strong>buckets</strong>.
    Each bucket may for example be a category to which a product in
    a catalog belongs.
</p>
<p>
    When you build aggregations for your filter, you define the buckets
    Elasticsearch should group the documents in.
</p>
<p>
    Now try implementing a aggregation with a bucket on the values
    of the field <strong>family</strong> using a terms aggregation.
</p>
<p>
    If you want to know more about the fields and the data available,
    check <a href="http://localhost:5601" target="_blank">Kibana</a>.
</p>
<p>
    <?php
    $modalId = 'familyAggregation';

    echo getResultButton('Load aggregations', $modalId, getExerciseFilename(__FILE__));
    echo getResultModal($modalId);
    ?>
</p>
<p>
    By default, Elasticsearch only returns the first 10 highest counting
    values within a bucket.
</p>
<?php
echo getHelpResources(
    [
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/6.0/search-aggregations-bucket-terms-aggregation.html',
            'title' => 'Elasticsearch docs: Terms Aggregation'
        ]
    ]
);
?>

<h3>7.2: Bonus - Adding another aggregation</h3>
<p>
    Try adding a aggregation for the field categories.
</p>
<p>
    <?php
    $modalId = 'categoryAggregation';

    echo getResultButton('Load aggregations', $modalId, getExerciseFilename(__FILE__));
    echo getResultModal($modalId);
    ?>
</p>


<h3>7.2: Bonus - Well, that ain't right</h3>
<p>
    Until now everything seems okay. But see what happens when
    you add a aggregation on the field <strong>family_wrongly_mapped</strong>.
</p>
<p>
    <?php
    $modalId = 'wrongAggregation';

    echo getResultButton('Load aggregations', $modalId, getExerciseFilename(__FILE__));
    echo getResultModal($modalId);
    ?>
</p>
<p>
    Suddenly you won't receive a bucket for <strong>pc monitors</strong>,
    but 2 separated buckets for <strong>pc</strong> and <strong>monitors</strong>.
    Why is that? It all comes down to the way the fields are mapped.
</p>
<p>
    The field <strong>family</strong> is mapped as a <strong>keyword</strong>
    field (in ES 5, this was type: string, index: not_analyzed), and
    the field <strong>family_wrongly_mapped</strong> is mapped as a
    <strong>text</strong> field (in ES 5 this is type: string, index:
    analyzed).
</p>
<p>
    The difference between <strong>analyzed</strong> and <strong>not_analyzed</strong>
    is that with analyzed each word is valued as a value on its own,
    while with <strong>not_analyzed</strong> the whole value of the
    field is valued as one.
</p>

<p>
    <?php echo getNextExercisePageHref(__FILE__); ?>
</p>
