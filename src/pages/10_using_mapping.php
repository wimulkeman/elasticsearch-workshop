<h2>10: Using mapping</h2>

<p>
    Oh boy, we have just created our own very first index! Or maybe your second
    or third, or you lost count because you've done your share of Elasticsearch
    stuff.
</p>
<p>
    But if it was your first time, wasn't it exciting? That thrill to discover you
    can create some new world wonder using just your fingertips and some of your
    brain as well!
</p>
<p>
    Now it is time to make it ready to go to war. We're gonna make it useful.
    Your index will be good, it will be great. It will be your index first!
    We will add a mapping to it!
</p>
<h3>10.1: Adding fields to the index</h3>
<p>
    We are starting simple. Add the fields <strong>firstname</strong> and <strong>lastname</strong>
    fields to your <strong>hello_world</strong> index, and make them of the type text. Try adding
    them using <?php echo loadJsonFileInKibana('blank_mapping_syntax.json'); ?>.
</p>
<?php
echo getHelpResources(
    [
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/current/mapping.html#_example_mapping',
            'title' => 'Elasticsearch docs: Example Mapping'
        ]
    ]
);
?>
<h3><i class="material-icons">error</i> Error</h3>
<p>
    Oh damn, we encountered our most fearsome enemy, an error! What happened?
</p>
<p>
    In the previous exercise we already created the index <strong>hello_world</strong>,
    and Elasticsearch has a <a href="https://www.elastic.co/guide/en/elasticsearch/reference/current/mapping.html#_updating_existing_field_mappings">policy in place</a>
    to prevent changing an existing mapping to ensure existing documents within that index don't
    become corrupted. Those clever folks at Elastic.
</p>
<h3>10.2: Deleting an index</h3>
<p>
    But what to do for now? You need that new mapping to apply to your index to make it
    work for this exercise... We're going to do something you should <strong>never</strong>
    do in a production environment, or at least not when it can be traced back at you ;).
    We are going to delete the existing index.
</p>
<p>
    Open <?php echo loadKibanaDevTools(); ?> and delete the existing <strong>hello_world</strong>
    index.
</p>
<?php
echo getHelpResources(
    [
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/6.4/indices-delete-index.html',
            'title' => 'Elasticsearch docs: Delete index'
        ]
    ]
);
?>
<h3>10.3: Rerun that script <i class="material-icons">repeat</i></h3>
<p>
    Now we cleared that inconvenience, try recreating the index using your new mapping.
    Hopefully you still have that one opened in one of your tabs.
</p>

<p>
    <?php echo getNextExercisePageHref(__FILE__); ?>
</p>
