<h2>12: Updating old indexes</h2>
<p>
    Up to this point we used the cutting edge of the index power
    available in Elasticsearch, but you're engaging monstrous indexes from the old
    days on a daily basis, and they don't like change!
</p>

<h3>12.1: Transforming a index from 5.* to 6.*</h3>
<p>
    When Elasticsearch updated its internal workings from version 5 to 6, it changed
    quite a bit under its hood. And you would feel that immediately when you
    try to use your old mapping on your brand new Elasticsearch 6 index.
</p>
<p>
    During this exercise we're going to refurbish that old school mapping
    into something roadworthy for this new era.
</p>
<p>
    Load <?php echo loadJsonFileInKibana('old_es5_mapping.json'); ?>
    with an old Elasticsearch 5 mapping, and try to make it work on your Elasticsearch
    6 cluster.
</p>
<?php
echo getHelpResources(
    [
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/6.4/breaking-changes-6.0.html',
            'title' => 'Elasticsearch docs: Breaking changes in 6.0'
        ],
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/6.4/removal-of-types.html',
            'title' => 'Elasticsearch docs: Removal of mapping types'
        ]
    ]
);
?>
<p>
    Did you also take a good look at the analyser used? Could that one also be
    done a bit simpler?
</p>
<?php
echo getHelpResources(
    [
        [
            'url' => 'https://www.elastic.co/guide/en/elasticsearch/reference/current/keyword.html',
            'title' => 'Elasticsearch docs: Keyword datatype'
        ]
    ]
);
?>

<p>
    <?php echo getNextExercisePageHref(__FILE__); ?>
</p>
