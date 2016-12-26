<?php
$title = "Resources";
$cssArray = array("./css/bootstrap-toggle.min.css", "./css/style.css", "../css/idx_style.css");
$scriptSourceArray = array(
    array('src' => './js/table.js'),
    array('src' => './js/bootstrap-toggle.min.js')
);
 ?>
<?php require($_SERVER["DOCUMENT_ROOT"] . "/template/cesa-header.php"); ?>
<?php require_once("resources.php"); ?>


<?php
$ss = new Resources();
$ss->populatePage();
?>


<script src="js/utilities.js"></script>
<style>
object {
width: 100%;
height: auto;
}
</style>

<?php require($_SERVER["DOCUMENT_ROOT"] . "/template/cesa-footer.php"); ?>
