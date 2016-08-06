<!DOCTYPE html>
<?php require_once("resources.php"); ?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"><!-- test compiled and minified CSS -->><!-- Optional theme -->
    <link rel="stylesheet" href="/css/bootstrap.min.css"><!-- Optional theme -->
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css"><!-- Latest compiled and minified JavaScript -->
    <link rel="stylesheet" href="./css/bootstrap-toggle.min.css">
    <link rel="stylesheet" href="./css/style.css"><!-- Style sheet for index.html -->

    <script   src="http://code.jquery.com/jquery-1.12.4.min.js"   integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="   crossorigin="anonymous"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="./js/table.js"></script>
    <script src="./js/bootstrap-toggle.min.js"></script>
    <title>
        CESA web testpage
    </title>
</head>

<body>
   <nav class="navbar navbar-dark bg-primary navbar-fixed-top">
        <div id="main-nav" class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->


            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">☰<span class="sr-only">Toggle navigation</span></button> <a class="navbar-brand" href="/">CESA</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->


            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a class="page_nav" href="/#introduction">Introduction</a>
                    </li>
                    <li>
                        <a class="page_nav" href="/#activities">Activities</a>
                    </li>

                    <li>
                        <a class="page_nav" href="/#resources">Resources</a>
                    </li>
                    <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More</a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">doo</a>
                            </li>
                        </ul>
                    </li> -->
                </ul>


            </div>
        </div>
    </nav>
<?php 
$ss = new Resources();
$ss->populatePage();
?>


<script src="js/utilities.js"></script>
</body>
<style>
object {
width: 100%;
height: auto;
}
</style>
</html>
