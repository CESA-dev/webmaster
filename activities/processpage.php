<?php require_once("activities.php")?>
<html>
<head>
    <meta charset="utf-8">

</head>
<body>
<?php

function make_thumb($src, $dest) {

	/* read the source image */
	$source_image = imagecreatefromjpeg($src);
//	$width = imagesx($source_image);
//	$height = imagesy($source_image);
        $width = 500;
        $height = 300;        
	/* find the "desired height" of this thumbnail, relative to the desired width  */
	//$desired_height = floor($height * ($desired_width / $width));
        $desired_width = 500;
        $desired_height = 300;
	/* create a new, "virtual" image */
	$virtual_image = imagecreatetruecolor($desired_width, $desired_height);
	
	/* copy source image at a resized size */
	imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
	
	/* create the physical thumbnail image to its destination */
	imagejpeg($virtual_image, $dest, 100);
}

$name = $_POST["name"];
$year = $_POST["year"];
$url = $_POST["url"];
//if(!isset($_FILES["thumbnail"])){
//    echo "no thumbnail uploaded";
//    die();
//}
//verify information


$act = new Activities();
$id = $act->insertData($name, $year, $url);
if(!$id){
    die();
}

//if(!isset($_FILES["thumbnail"])){
//    echo "no thumbnail uploaded";
//    die();
//}
$target_dir = "uploads/".strval($id)."/";
mkdir($target_dir, 0755, true);
//$target_file = $target_dir . 'thumbnail.jpg';
//$uploadOk = 1;
//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
//// Check if image file is a actual image or fake image
//if(isset($_POST["submit"])) {
//    $check = getimagesize($_FILES["thumbnail"]["tmp_name"]);
//    if($check !== false) {
//        echo "File is an image - " . $check["mime"] . ".";
//        $uploadOk = 1;
//    } else {
//        echo "File is not an image.";
//        $uploadOk = 0;
//    }
//}
//// Check if file already exists
//if (file_exists($target_file)) {
//    echo "Sorry, file already exists.";
//    $uploadOk = 0;
//}
//// Check file size
//if ($_FILES["thumbnail"]["size"] > 500000) {
//    echo "Sorry, your file is too large.";
//    $uploadOk = 0;
//}
//// Allow certain file formats
//if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//&& $imageFileType != "gif" ) {
//    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//    $uploadOk = 0;
//}
//// Check if $uploadOk is set to 0 by an error
//if ($uploadOk == 0) {
//    echo "Sorry, your file was not uploaded.";
//// if everything is ok, try to upload file
//} else {
//    if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
//        echo "The file has been uploaded.";
//        make_thumb($target_file, $target_file);
//        echo "The thumbnail has been created"; 
//
//    } else {
//        echo "Sorry, there was an error uploading your file.";
//    }
//}

if(isset($_POST['imagebase64'])){
    $data = $_POST['imagebase64'];

    list($type, $data) = explode(';', $data);
    list(, $data)      = explode(',', $data);
    $data = base64_decode($data);
    echo $type;
    file_put_contents($target_dir.'thumbnail.png', $data);
}

?>

</body>
</html>

