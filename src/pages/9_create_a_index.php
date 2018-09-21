<h2>9: Create a index</h2>

<?php echo displayExerciseLocationNotice(__FILE__); ?>

<p>
    Wait what? Where we not just a few moments ago messing with those awesome
    queries on the index, and now you're reading about mappings and indexes.
    What happened?
</p>
<p>
    In the last exercise we created synonyms, which influence the mapping of
    fields and there values when you create a index. So now that you now how
    to use those marvelous contraptions, and know how to retrieve you're data
    from that big box called a <strong>index</strong>, lets see what an index is.
</p>
<p>
    In this lesson we embark ourselves on a complete new journey. A journey
    which predates the work happy query era from our previous exercises, if we
    had a time machine.
</p>
<p>
    Let's start with creating our first own index. The Hello World step of your
    index experience in Elasticsearch.
</p>

<h3>9.1: Hello index world!</h3>
<p>
    For this exercise, we start simple. Open the console from
    <a target="_blank" href="http://localhost:5601/app/kibana#/dev_tools/console?load_from=http://localhost/resources/json/create_a_index.json">Kibana</a>
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
    <?php echo getNextExercisePageHref(__FILE__); ?>
</p>
