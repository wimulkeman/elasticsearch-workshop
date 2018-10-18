<h2>13: Modifying data</h2>
<p>
    Elasticsearch has some mechanisms available to modify the way it looks
    and to index certain data. Those mechanisms are called analysers and
    normalizers.
</p>

<h3>13.1: Analyse this or Analyse that</h3>
<p>
    Maybe Elasticsearch isn't a shrink, but from time to time
    our data needs to be analysed. You aren't required to be a mobster for that!
</p>
<p>
    An analyser within Elasticsearch can help you for example to not index
    all the words within a document field separately, but as one whole. That
    can be useful when you need to filter on the value of a field.
</p>
<p>
    Try the different types of analysers as described at the docs of Elasticsearch.
    There is a handy way available to test those analysers without creating a index!
</p>
<p>
    For this exercise you can use <?php echo loadKibanaDevTools(); ?>
</p>
<?php
echo getHelpResources(
    [
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/current/analysis-analyzers.html',
            'title' => 'Elasticsearch docs: Analysers'
        ],
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/current/_testing_analyzers.html',
            'title' => 'Elasticsearch docs: Testing analysers'
        ]
    ]
);
?>

<h3>13.2: Going crazy with analysers</h3>
<p>
    When comfortable with the default analysers, you can try to build your own. Make an
    analyser which treats each word divided by a space as a new term, and transforms
    all words to lowercase. Use <?php echo loadKibanaDevTools(); ?> for this.
</p>
<?php
echo getHelpResources(
    [
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/current/analysis-custom-analyzer.html',
            'title' => 'Elasticsearch docs: Custom Analyzer'
        ],
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/current/analysis-tokenizers.html',
            'title' => 'Elasticsearch docs: Tokenizers'
        ],
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/current/analysis-tokenfilters.html',
            'title' => 'Elasticsearch docs: Tokenfilters'
        ]
    ]
);
?>

<h3>13.3: Just be normal, that's already strange enough</h3>
<p>
    Normalizers within Elasticsearch can be used to convert data inserted into the
    index to a default format. That can be used to simplify the search for documents which
    contain special characters.
</p>
<p>
    Try adding a normalizer to change special characters to lowercase default ascii values
    using <?php echo loadJsonFileInKibana('create_basic_hello_world_index_with_kassner_document.json'); ?>.
</p>
<p>
    After adding the normalizer to your index ad as a document a person with
    firstname: Björn, lastname: Kaßner, and try to search for it using as
    search terms firstname: bjorn, lastname: kassner.
</p>
<?php
echo getHelpResources(
    [
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/current/normalizer.html',
            'title' => 'Elasticsearch docs: Normalizer'
        ]
    ]
);
?>

<p>
    <?php echo getNextExercisePageHref(__FILE__); ?>
</p>
