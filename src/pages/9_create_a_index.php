<h2>9: Create a index</h2>

<p>
    Wait what? Were we not just a few moments ago messing with those awesome
    queries on the index, and now you're reading about mappings and indexes.
    What happened?
</p>
<p>
    In the last exercise we created synonyms, which influence the mapping of
    fields and their values when you create a index. So now that you know how
    to use those marvelous contraptions, and know how to retrieve your data
    from that big box called a <strong>index</strong>, let us see what an index is.
</p>
<p>
    In this lesson we embark ourselves on a complete new journey. A journey
    which predates the work happy query era from our previous exercises, as if we
    had a time machine.
</p>
<p>
    Let's start with creating our first own index. The Hello World step of your
    index experience in Elasticsearch.
</p>

<h3>9.1: Hello index world!</h3>
<p>
    For this exercise, we start simple. Open the console from
    <?php echo loadJsonFileInKibana('create_a_index.json'); ?>
    and try to create a index named hello_world.
</p>

<?php
echo getHelpResources(
    [
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/current/indices-create-index.html',
            'title' => 'Elasticsearch docs: Create a index'
        ]
    ]
);
?>

<p>
    If all went well, you should receive an acknowledgement message after pushing
    that enormous green arrow in the console window in Kibana.
</p>
<h4>9.1.1: Unleash the nerd within you!</h4>
<p>
    But how did you create the index? Have you created it using 1 shard, or multiple?
    And how many replicas did you make it use? And what are those things? You can read
    more about it in the documentation of
    <a href="https://www.elastic.co/guide/en/elasticsearch/reference/current/_basic_concepts.html#getting-started-shards-and-replicas">Elasticsearch</a>.
</p>
<h3>9.2: Find your index stats</h3>
<p>
    Another way to check if your index is created is by using the tremendous powerful
    interface that Kibana offers us. Ain't that sweet of that little program.
</p>
<p>
    Follow the following steps to see all the interfaces known in Elasticsearch:<br>
    <ol>
        <li>Open <?php echo loadKibana(); ?></li>
        <li>Open the management tab in the menu</li>
        <li>Click under Elasticsearch on "Index Management"</li>
        <li>See if your index name is listed</li>
    </ol>
</p>
<h4>9.2.1: What's in the index</h4>
<p>
    Normally we would want to look into the index also using the discovery tab in the menu. To do that
    we can follow the following steps:<br>
    <ol>
        <li>Open <?php echo loadKibana(); ?></li>
        <li>Open the management tab in the menu</li>
        <li>Click under Kibana on "Index Patterns"</li>
        <li>Click on Create Index</li>
        <li>Enter the name of your index, it should be visible in the list under the textbox</li>
    </ol>
    And done... wait what? It doesn't appear? What happened? It is there, but not there?
</p>
<p>
    Although we created an index, it is completely empty, and a storage without shelves isn't exactly
    a storage now is it? It is time to create those shelves and bring a system into it using something
    called <strong>mapping</strong>.
</p>

<p>
    <?php echo getNextExercisePageHref(__FILE__); ?>
</p>
