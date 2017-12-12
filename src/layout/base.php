<!doctype html>
<html lang="en">
<head>
    <title>Elasticsearch workshop</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="/resources/css/highlight/default.css">
    <link rel="stylesheet" type="text/css" href="/resources/css/highlight/darcula.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Elasticsearch workshop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/reset_index.php">Reset index</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" target="_blank" href="http://localhost:5601">Show dataset (Kibana)</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Exercises
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                        $nr = 1;
                        foreach ($exercisePages as $href => $page) {
                            $activeClass = !empty($page['active']) ? 'active' : '' ;
                            $disabledClass = !empty($page['disabled']) ? 'disabled' : '' ;

                            echo "<a class=\"dropdown-item {$activeClass} {$disabledClass}\" href=\"/{$href}\">{$page['number']}: {$page['title']}</a>";

                            $nr ++;
                        }
                        ?>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <?php
        if (!empty($_GET['message'])) {
            echo <<<html
                <div class="alert alert-primary" role="alert">
                  {$_GET['message']}
                </div>
html;

        }
        echo $pageContent;
        ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <script src="/resources/js/highlight.pack.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>

    <script>
        $(document).ready(function () {
            $('.modal-result-filler').submit(function (event) {
                event.preventDefault();

                var $form = $(this);
                var target = $form.attr('data-target');
                var content = $(target).find('.modal-body');

                $(content).html("<b>Loading response...</b>");

                $.ajax({
                    type: $form.attr('method'),
                    url: $form.attr('action'),
                    data: $form.serialize(),

                    success: function (data, status) {
                        $(content).html(data);
                        $(target).modal('show');
                    }
                });
            });
        });
    </script>

    <script src="/resources/js/bootstrap3-typeahead.min.js"></script>
    <script>
        if ($('.typeahead') !== undefined) {
            $('.typeahead').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            },
            {
                limit: 12,
                async: true,
                source: function (query, processSync, processAsync) {
                    processSync(['This suggestion appears immediately', 'This one too']);
                    return $.ajax({
                        url: '/exercises/type_ahead.php',
                        type: 'GET',
                        data: {query: query},
                        dataType: 'json',
                        success: function (json) {
                            // in this example, json is simply an array of strings
                            return processAsync(json);
                        }
                    });
                }
            });

            // $('.typeahead').typeahead({
            //     source: function (query, process) {
            //         return $.get('/exercises/type_ahead.php', { query: query }, function (data) {
            //             return process(data.options);
            //         });
            //     }
            // });
        }
    </script>
</body>
</html>