<h2>14: Using SQL on indexes</h2>
<p>
    As of Elasticsearch version 6.3, there is a new feature available which may sound
    familiar to those working in de development world. Elasticsearch introduced
    SQL support. Yeah baby!
</p>
<p>
    Although it is still an experimental feature, you can already experiment with how it
    works and interacts within an existing index, as long as it is running on Elasticsearch
    6.3 or higher, which is something this workshop is doing.
</p>

<h3>14.1: Selecting all the records</h3>
<p>
    For this exercise you can try to use some of that SQL power for a simple task,
    retrieving all the records from your index. Try doing that by using <?php echo loadKibanaDevTools(); ?>.
</p>
<?php
echo getHelpResources(
    [
        [
            'url' => 'https://www.elastic.co/products/stack/elasticsearch-sql',
            'title' => 'Elasticsearch SQL'
        ],
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/6.4/sql-commands.html',
            'title' => 'Elasticsearch docs: SQL Commands'
        ],
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/current/xpack-sql.html',
            'title' => 'Elasticsearch docs: SQL Access'
        ]
    ]
);
?>

<h3>14.2: Shorter</h3>
<p>
    That SQL is available doesn't mean that you have to use it. Try retrieving all the records
    by using the DSL of Elasticsearch in <?php echo loadKibanaDevTools(); ?>. It should
    be shorter to write.
</p>
<?php
echo getHelpResources(
    [
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/current/query-dsl-match-all-query.html',
            'title' => 'Elasticsearch docs: Match All Query'
        ]
    ]
);
?>
<p>
    For now SQL may come in handy for managing your Elasticsearch cluster, but I would not
    recommend it for viewing data in your production environment. That could change in
    the future as the retrieval through SQL is fast, but less fault proof than the DSL language.
</p>

<h3>14.3: Get your shot of DSL through SQL</h3>
<p>
    One of the neat features of SQL is the ability to generate the equivalent DSL syntax for
    you. Try that by running the previous SQL query to select all the records,
    but now add <strong>POST _xpack/sql/translate</strong> as the first line and the usage of
    <strong>WHERE</strong> in your query.
</p>
<p>
    This translation part can come in handy when you need to write a more complex
    query using DSL, as the DSL structure is still used by most of the packages
    between the applications and the Elasticsearch indexes. The SQL translate function
    will try to create the best performing DSL syntax for your request.
</p>

<p>
    If you want to read more about the usage of SQL within Elasticsearch, you can read
    at their
    <a href="https://www.elastic.co/blog/an-introduction-to-elasticsearch-sql-with-practical-examples-part-1" target="_blank">blog post</a>
    about it.
</p>
<p>
    Well that's all folks!
</p>

<p>
    <?php echo getNextExercisePageHref(__FILE__); ?>
</p>
