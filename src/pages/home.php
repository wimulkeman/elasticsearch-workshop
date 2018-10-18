<h2>Getting started</h2>
<p>
    Because we rely on third-party vendors, you need to install some stuff
    first.
</p>
<p>
    Go into your docker container with the following command

    <pre><code class="bash">docker exec -it php71 bash</code></pre>

    and run the following command

    <pre><code class="bash">composer install</code></pre>

    after that, you should be ready for your first exercise.
</p>

<k2>Kibana</k2>
<p>
    First click on the <strong>Reset index</strong> button
    in the menu.
</p>
<p>
    When you open <?php echo loadKibana(); ?>
    you will be confronted with a question. What index would
    you like to see?
</p>
<p>
    Replace the text in the field with <strong>webstores</strong>
    (the name of the index), and click on <strong>Create</strong>.
    You should now see the mapping of your index. Afterwards you
    can click on Discover on the top in the menu on the left.
    There you can see the loaded dataaset.
</p>

<h2>Your first exercise</h2>
<p>Each exercise contains of the following steps:</p>
<ol>
    <li>Read the instructions</li>
    <li>Complete the code in the exercises folder</li>
    <li>Watch the wonderful output on the page</li>
</ol>
<p>
    Before each exercise, you can use the <a href="/reset_index.php">reset index button</a> to reset
    the index.
</p>
<p>You can find the exercises under the exercise button in the menu.</p>

<h2>Elasticsearch lingo</h2>
<p>
    In these exercises we will use some lingo which comes with
    working with Elasticsearch. Those words may be a bit confusing at
    first, but if you know your databases, then no worries! We will
    explain them for you!
</p>
<p>
    <strong>Document</strong> is your record and contains the data
    of it.<br>
    <strong>Type</strong> is your table. Your resonate your documents
    under a type.<br>
    <strong>Index</strong> can be compared with your database. It
    contains your types.
</p>
