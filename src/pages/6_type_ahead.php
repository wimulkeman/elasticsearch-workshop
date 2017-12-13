<h2>6: Type ahead</h2>

<?php echo displayExerciseLocationNotice(__FILE__); ?>

<p>
    One fancy aspect of Elasticsearch is the type ahead functionality.
</p>
<p>
    This exercise contains of one part. Try implementing the type ahead
    functionality in Elasticsearch. When finished, you should receive a
    list with options when you start typing in the field below.
</p>
<p>
    <div>
        <input type="text"
               class="typeahead"
               data-provide="typeahead"
               autocomplete="off"
        >
    </div>
</p>
<p>
    Wow, if we would mix these exercises together, we could create that
    Google feeling on our own websites!<br>
    <?php echo getNextExercisePageHref(__FILE__); ?>
</p>

