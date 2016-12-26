<?php require_once("activities.php");?>

<?php
$title = "Activities";
$cssArray = array("./css/activities_style.css", "./css/grid_style.css", "../css/idx_style.css");
 ?>
<?php require($_SERVER["DOCUMENT_ROOT"] . "/template/cesa-header.php"); ?>


<div class="spacer">

    <div id="carousel-main" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel-main" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-main" data-slide-to="1"></li>
            <li data-target="#carousel-main" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
        <?php
            $ac = new Activities();
            $ac->populateActivitiesCarousel();
            ?>
        </div>
        <a class="left carousel-control" href="#carousel-main" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#carousel-main" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </div>
   <!-- past activities here, can be linked with wechat pages-->
    <!-- should be generated by backend scripts -->
<?php
    $ac->populateActivitiesPage();?>
<!--model demo-->
</div>
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="mymodallabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="mymodallabel">modal title</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>
$.getJSON("activities.php", function(data){
    $.each( data, function( key, val ) {
        console.log(key, val);
    });
});
</script>
<?php require($_SERVER["DOCUMENT_ROOT"] . "/template/cesa-footer.php"); ?>
