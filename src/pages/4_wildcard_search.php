<h2>4: Wildcard search</h2>

<?php echo displayExerciseLocationNotice(__FILE__); ?>

<h3>4.1: Searching just a part</h3>
<p>
    You were minding your own business, dreaming of that one
    gigantic pile of documents in your so carefully stacked
    index, when an email of that beloved customer drops into your
    mailbox. They love their new search engine, it works wonderful!
    It's truly amazing! Except for that one little thing, they can't
    search SKU with them. You're fingers are already on the keyboard
    to explain to them that you support typos, and that you can't raise
    the correcting of those anny higher, when you see the catch.
</p>
<p>
    THey don't have a typo in there SKU, but are just typing a part
    of the SKU, and want all the articles returned where the SKU
    contains that typed part. How to fix that?
</p>
<p>
    This is something we can't solve with some simple <strong>matching</strong>
    or with <strong>fuzziness</strong>, we need something more powerful.
</p>
<p>
    Lucky Elasticsearch supports something called <strong>wildcard</strong>
    query. It enables to search for a partial of a word.
</p>
<p>
    Try implementing it so you can find some results on the
    field <strong>sku</strong> which start with the part <strong>138</strong>.
</p>
<?php
$modalId = 'forwardWildcardQuery';

echo getQueryForm($modalId, getExerciseFilename(__FILE__));
echo getResultModal($modalId);
?>
<?php
echo getHelpResources(
    [
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/5.0/query-dsl-wildcard-query.html',
            'title' => 'Elasticsearch docs: Wildcard Query'
        ]
    ]
);
?>
<p>
    Well done! But do take notice of the score which is assigned
    to the results found. As you can see, they are all 1. Wildcard
    search can be useful, but only for the edge cases where you know
    what you should find, and almost always in combination with other
    implemented matching types.
</p>

<h3>4.2: Getting to the head</h3>
<p>
    Implement a wildcard for searching everything that ends
    with <strong>447</strong>.
</p>
<?php
$modalId = 'backwardWildcardQuery';

echo getQueryForm($modalId, getExerciseFilename(__FILE__));
echo getResultModal($modalId);
?>

<h3>4.3: Somewhere in the middle</h3>
<p>
    For completing it all, now try to implement a wildcard which
    cuts out something the in the middle. Search for a <strong>SKU</strong>
    starting with <strong>17</strong>, and ending with <strong>27</strong>.
</p>
<?php
$modalId = 'somethingInTheMiddleWildcardQuery';

echo getQueryForm($modalId, getExerciseFilename(__FILE__));
echo getResultModal($modalId);
?>

<p>
    And another happy customer leaves your office!<br>
    <?php echo getNextExercisePageHref(__FILE__); ?>
</p>
