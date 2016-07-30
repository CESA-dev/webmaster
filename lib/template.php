
<?php

//////////////////////////////////////////////////////////
// This is a file that contains all kinds of templates! //
//////////////////////////////////////////////////////////

function header_default_content() {
    echo <<<EOD
        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"><!-- test compiled and minified CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css"><!-- Optional theme -->
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css"><!-- Latest compiled and minified JavaScript -->
    <link rel="stylesheet" href="/css/idx_style.css"><!-- Style sheet for index.html -->

    <script   src="http://code.jquery.com/jquery-1.12.4.min.js"   integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="   crossorigin="anonymous"></script>
    <script src="/js/bootstrap.min.js"></script>
EOD;
}


function body_default_title($title) {
    echo <<<EOD
    <h1 class="title_default">$title</h1>
EOD;

}


?>

