<h2>2: Match with fuzziness</h2>

<?php echo displayExerciseLocationNotice(__FILE__); ?>

<h3>2.0: It's those customers, I tell you man, those customers</h3>
<p>
    Customers, we love them for they generate the page views on our
    sites, but we also sometimes hate them. Why? Because they will
    come back to use after we created that wonderful search engine
    for them, but it doesn't support typos! The horror we are faced with!
</p>
<p>
    But Elasticsearch comes to the rescue, and it asks you to tag
    along. How is that, you ask? It needs to know from you how
    strict it needs to check for <strong>possible</strong> typos.
</p>
<p>
    To correct typos in a search word, Elasticsearch offers us something
    called <strong>fuzziness</strong>. The
</p>

<h3>2.1: Just one character at the time</h3>
<p>
    Let's start simple. Start with writing a query with a fuzziness
    of <strong>1</strong>. No need to worry about the match query
    itself, we've already written that part for you.
</p>
<p>
    After implementing it, try searching for one of these words
    <strong>lxemark</strong> or <strong>elxmark</strong>. Looks
    promising &#9786;.
</p>
<?php
$modalId = 'oneCharacterFuzziness';

echo getQueryForm($modalId, getExerciseFilename(__FILE__));
echo getResultModal($modalId);
?>
<p>
    But what happens when you enter <strong>elxmrak</strong>?
    Oh no! There goes those wonderful results! In the next exercise
    we will look at the options for supporting customers who may have
    some typing problems.
</p>
<?php
echo getHelpResources(
    [
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/5.0/query-dsl-match-query.html#query-dsl-match-query-fuzziness',
            'title' => 'Elasticsearch docs: Match Query - fuzziness'
        ],
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/5.0/common-options.html#fuzziness',
            'title' => 'Elasticsearch docs: Common options - fuzziness'
        ]
    ]
);
?>

<h3>2.2: Fixing multiple typos</h3>
<p>
    Alright, so we can fix one typo, but for those customers that
    want even more convenience? Can we provide that? Yes we can!
</p>
<p>
    The fuzziness option defines how many characters Elasticsearch
    may change to find a matching word. A fuzziness of <strong>1</strong>
    allowed us to fix 1 typo. So upping it a little should allow for a
    even better fix! Try raising the fuzziness to <strong>3</strong>
    and see what happens when you search <strong>elxmrak</strong> now.
</p>
<?php
$modalId = 'threeCharacterFuzziness';

echo getQueryForm($modalId, getExerciseFilename(__FILE__));
echo getResultModal($modalId);
?>

<h3>2.3: Maybe one step to far</h3>
<p>
    Oh boy, it works, what a delight! So raising the fuzziness to
    the stars and beyond solves everything now does it not. Well,
    maybe not. See what happens when we make the number really high
    like for example <strong>5</strong>, and enter the search term <strong>foo</strong>.
</p>
<?php
$modalId = 'fiveCharacterFuzziness';

echo getQueryForm($modalId, getExerciseFilename(__FILE__));
echo getResultModal($modalId);
?>
<p>
    Do you see what is happening there? You still get a lot of results,
    but none of those make sense for the term you provided.
</p>
<p>
    When you have a fuzziness of 5, it means that when you enter
    the term <strong>foo</strong>, it may change up to 5 characters
    of that term to match other words in its index. That's all of the
    characters in the term! Isn't their a midway in this madness?
</p>

<h3>2.4: Back to the drawing board</h3>
<p>
    There is. Elasticsearch provides a setting for fuzziness
    called <strong>auto</strong>. It makes the fuzziness value
    dependent on the size of the search term. Is the term long, than
    the fuzziness will be high. Is it short, than the fuzziness is
    low or even <strong>0</strong>.
</p>
<p>
    Implement the auto value for your fuzziness search, and retry those
    term <strong>foo</strong>, <strong>lxemark</strong> and <strong>elxmrak</strong>.
</p>
<?php
$modalId = 'autoFuzziness';

echo getQueryForm($modalId, getExerciseFilename(__FILE__));
echo getResultModal($modalId);
?>
<p>
    Seems quiet a bit better, doesn't it? For auto the fuzziness value
    is:
    <ul>
        <li><strong>0</strong> when the term is between <strong>0</strong> and <strong>2</strong> characters long</li>
        <li><strong>1</strong> when the term is between <strong>3</strong> and <strong>5</strong> characters long</li>
        <li><strong>2</strong> when the term is longer then <strong>5</strong> characters</li>
    </ul>
</p>

<p>
    Wow, you now can correct typos without a hesitation!<br>
    <?php echo getNextExercisePageHref(__FILE__); ?>
</p>
