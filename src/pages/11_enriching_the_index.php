<h2>11: Enriching the index</h2>
<p>
    Now we have a index with two fields. Lets try and see if we can discover what
    is inside of it using <?php echo loadKibana(); ?>. To be able to see an index and
    its fields, from the discovery mode in Kibana, it needs to have some data within it.
</p>

<h3>11.1: Adding your first document</h3>
<p>
    We need a name to add as a document in our index, but what should it be?
    When your stuck on doubt, John Doe will get you out! Ad a document to the index
    with as firstname <strong>John</strong>, and as lastname <strong>Doe</strong>.
</p>
<?php
echo getHelpResources(
    [
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/guide/current/index-doc.html',
            'title' => 'Elasticsearch docs: Indexing a Document'
        ]
    ]
);
?>

<h3>11.2: Discover your new created index</h3>
<p>
    Now that we have an index and something in it, its time to follow John Doe and discover
    this new frontier. To enable Kibana to analyse your index, we need to add it first. You can do that
    by following these steps:
    <ol>
        <li>Open <?php echo loadKibana(); ?></li>
        <li>Open the management tab in the menu</li>
        <li>Click under Kibana on "Index Patterns"</li>
        <li>Click on Create Index</li>
        <li>Enter the name of your index, it should be visible in the list under the textbox</li>
        <li>After finishing the steps, click on the tab "Discover"</li>
        <li>You should see one record of John Doe the index hello_world</li>
    </ol>
</p>

<h3>11.3: More about him, expanding the document</h3>
<p>
    We now have our start of unraveling the mystery surrounding John Doe,
    but we need more information to make it useful for any system we can connect
    to our index. Its time to enrich our data.
</p>
<p>
    Try to add the following fields <strong>birthday</strong> (date field) and
    <strong>times_viewed</strong> (integer field).
</p>
<?php
echo getHelpResources(
    [
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/current/mapping-types.html',
            'title' => 'Elasticsearch docs: Field datatypes'
        ]
    ]
);
?>
<div class="alert alert-warning" role="alert">
    As we have seen at the end of the previous exercise, you can't update a index
    which is already created. To make it easier for you, you can load an already
    existing configuration with the steps of the previous exercise and extend that
    one. Open it using <?php echo loadJsonFileInKibana('create_basic_hello_world_index_with_a_document.json'); ?>
    and modify it where needed. Insert the document with only the firstname and lastname fields.<br><br>
    After updating it, run the steps sequentially as shown in the console.
</div>
<div class="alert alert-notice" role="alert">
    After adding new fields, you need to refresh your fields in your index pattern
    to see them in the discovery tab. Open <?php echo loadKibana(); ?> > Management >
    Kibana > Index Patterns > Index - Hello World > <i class="material-icons">repeat</i>.
</div>

<h3>11.4: Updating the data</h3>
<p>
    Now that we have our fields available, we can enrich the data. Our document only contains
    information for the firstname and lastname fields. In Elasticsearch it is possible to
    update certain parts of an index without knowing or providing all the defined fields
    within the mapping of the document.
</p>
<p>
    In your research on unraveling the mystery of John Doe your endeavour took you into
    some of the deepest archives known to modern men. You needed a stair to get to them!
    Inside one of them you found something known as paper, and on the record of the day
    a certain Doe, J was born. That must be John! You better update his record in your index
    for who knows when you may need that information.
</p>
<p>
    Try updating your record with the birthday you saw in the paper record, August 20, 1970
    by using <?php echo loadKibanaDevTools(); ?>.
</p>
<?php
echo getHelpResources(
    [
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/current/docs-update.html',
            'title' => 'Elasticsearch docs: Update API'
        ]
    ]
);
?>
<p>
    Did all went well? If you updated the correct record, then your John Doe record now
    should have a filled birthday field. If you have a new record with only a birthday
    field, then you should check if you provided the correct id to update the document.
</p>
<p>
    And while where at it, try updating the <strong>times_viewed</strong> field by adding as
    input value <strong>2 times today</strong> in <?php echo loadKibanaDevTools(); ?>. See what happens.
</p>
<p>
    Elasticsearch has some default validation rules for the different types of
    fields that are available for your index. You can use those to restrict the data
    which an application can inject in your index and keep your index clean by specifying
    specific field types for your document fields.
</p>
<p>
    Now try to update the <strong>times_viewed</strong> field by adding a numeric value.
</p>

<h3>11.5: Refactor your index</h3>
<p>
    We've updated our index a couple of times now, and every time you needed to recreate
    the index from scratch. Aldo that seems like a smart move to pressure you into
    mapping out your data structure before implementing anything at first, sometimes
    the world around you changes.
</p>
<p>
    What, for example, when our beloved manager decides to change the thing previous
    known as last name into surname for it is more convenient to use in documentation
    and already provided in documentations for other developers. We are screwed!
</p>
<p>
    Or maybe not? Elasticsearch has an option called alias fields. Those enable us to
    create a new virtual field which underneath maps to another field. THat enables us
    to use the same field for our old programs and new programs.
</p>
<p>
    Try creating a alias field <strong>surname</strong> which links to the field
    <strong>lastname</strong> in <?php echo loadJsonFileInKibana('update_hello_world_index.json'); ?>.
</p>
<?php
echo getHelpResources(
    [
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/master/alias.html',
            'title' => 'Elasticsearch docs: Index datatype'
        ],
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/current/indices-put-mapping.html',
            'title' => 'Elasticsearch docs: Put Mapping'
        ]
    ]
);
?>
<p>
    So it is possible to update your mapping after all! Well it is, but you should not get
    to comfortable with the idea. This kind of extending should only be done as a last resort
    type of plan.
</p>
<p>
    To see if this worked, open <?php echo loadKibanaDiscover(); ?> and search for "surname: Doe".
</p>

<h3>11.6: To fast?</h3>
<p>
    Did you go through these exercises way to easily? Then well done! But if you're doing
    this with other colleagues, you may want to wait for them to catch up. What you can
    do in the meantime? Try some of those other datatypes and test what kind of validation
    Elasticsearch has on them. A nice one for example is the <strong>ip</strong> address
    field datatype.
</p>
<?php
echo getHelpResources(
    [
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/current/mapping-types.html',
            'title' => 'Elasticsearch docs: Field datatypes'
        ]
    ]
);
?>

<p>
    <?php echo getNextExercisePageHref(__FILE__); ?>
</p>
