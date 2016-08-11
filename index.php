<?php
$title = "Home";
$cssArray = array("./css/idx_style.css");
 ?>
<?php require($_SERVER["DOCUMENT_ROOT"] . "/template/cesa-header.php"); ?>

    <div id="introduction" class="jumbotron">
        <h1 class="display-3">Introduction</h1>
        <p class="lead">Chinese Engineering Student Association is committed to provide high-quality services and resources to help Chinese Engineering students on campus to achieve their academic and career goals.</p>
        <a class="btn btn-primary btn-lg" href="/introduction" role="button">Learn more</a>
        </p>
    </div>
    <div id="activities" class="jumbotron">

         <h1  class="display-3">Activities</h1>
        <p class="lead">As an RSO aiming to serve all Chinese Engineering Students at University of Illinois at Urbana-Champaign, we hold many events in order to help them to be successful in courses, career development, socializing, and so on. Here you can find all the information about the activities we have held from since the very start of our organization.</p>
        <a class="btn btn-primary btn-lg" href="/activities" role="button">Learn more</a>
        </p>


    </div>

    <div id="resources" class="jumbotron">

         <h1  class="display-3">Resources</h1>
        <p class="lead">We try to put any helpful information that we have access together to help the students. You can find all the useful resources from us to download in this section. Here you can find all resources, ranging from campus living guides to technical manuals.</p>
        <a class="btn btn-primary btn-lg" href="/resources" role="button">Learn more</a>
        </p>


    </div>


<?php require($_SERVER["DOCUMENT_ROOT"] . "/template/cesa-footer.php"); ?>
