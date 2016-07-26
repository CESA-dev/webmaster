<?php
require_once("resources.php");
require_once("../lib/utils.php");

/**
 * A main function for this page
 * @param  string $message a message to display
 * @return none          none
 */
function resource_main(&$message){
    if(isset($_FILES) && isset($_POST["resource_name"]) && isset($_POST["resource_priority"]) && isset($_POST["resource_category"]) && isset($_POST["fake_secure"])) {
        $token = $_POST["fake_secure"];
        if(fake_secure($token)){
            $message = "wrong security token";
            return;
        }

        if($_FILES["zip_file"]["name"]) {

             $resource_sesson = new Resources();

             foreach($_POST["resource_category"] as $cate){
                echo $cate;
             }
             $living = 0;
             $academic = 0;
             $technical = 0;
             if(in_array("living", $_POST["resource_category"])){
                $living = 1;
             }
             if(in_array("academic", $_POST["resource_category"])){
                $academic = 1;
             }
             if(in_array("technical", $_POST["resource_category"])){
                $technical = 1;
             }
             $priority = $_POST["resource_priority"];
             $name = $_POST["resource_name"];
             $id = $resource_sesson->insertData($name, $priority, $living, $academic, $technical);
             if(!$id){
                $message = "cannot add to database";
                return;
             }
                




            $filename = $_FILES["zip_file"]["name"];
            $source = $_FILES["zip_file"]["tmp_name"];
            $type = $_FILES["zip_file"]["type"];
            
            $name = explode(".", $filename);
            $accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
            foreach($accepted_types as $mime_type) {
                if($mime_type == $type) {
                    $okay = true;
                    break;
                } 
            }
            
            $continue = strtolower($name[1]) == 'zip' ? true : false;
            if(!$continue) {
                $message = "The file you are trying to upload is not a .zip file. Please try again.";
            }
            $target_dir = "./uploads/" . strval($id). "/";
            mkdir($target_dir, 0755, true);
            $target_path = $target_dir . $filename;  // change this to the correct site path
            if(move_uploaded_file($source, $target_path)) {
                $output = shell_exec("whoami");
                // echo $output;
                // $output = system("unzip ".$target_path." 2>&1");
                // echo $output;

                $zip = new ZipArchive();
                $x = $zip->open($target_path);
                if ($x === true) {
                    $zip->extractTo("$target_dir"); // change this to the correct site path
                    $zip->close();
                // echo $output;
                    unlink($target_path);
                }
                $message = "Your .zip file was uploaded and unpacked.";
            } else {    
                $message = "There was a problem with the upload. Please try again.";
            }
        }
    }
    else {
        echo "Please fill out all fields";
    }
}

$message = "";
resource_main($message);
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<h2>Resource upload page</h2>
<?php if(isset($message)) echo "<p>$message</p>"; ?>
<form enctype="multipart/form-data" method="post" action="">
<label>Choose a name <input type="text" name="resource_name" /></label><br />
<label>Priority <input type="text" name="resource_priority" /></label><br />
<label>living <input type="checkbox" name="resource_category[]" value="living"/></label><br />
<label>technical <input type="checkbox" name="resource_category[]" value="technical"/></label><br />
<label>academic <input type="checkbox" name="resource_category[]" value="academic"/></label><br />
<label>Choose a zip file to upload: <input type="file" name="zip_file" /></label>
<label>enter your token: <input type="text" name="fake_secure" /></label>
<br />
<input type="submit" name="submit" value="Upload" />
</form>
</body>
</html>