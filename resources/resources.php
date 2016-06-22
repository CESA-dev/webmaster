


<?php 
function fooo(){

    include("template.php");
}


require_once('../config.php');
require_once('../lib/db_interface.php');


define('RESOURCE_LIVING', "living");
define('RESOURCE_ACADEMIC', "academic");
define('RESOURCE_TECHNICAL', "technical");

/* definitions
 */

/*
 * A class for resources page
 */


class Resources {

    /**
     * @var conn: connection to database
     */

    private $conn;
    
    /**
     * the constructor of the object, to connect with the database
     */
    function __construct(){
       $this->conn = connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if($this->conn == null)
            echo "Cannot connect to db";
    }
    

    /**
     * The function to get list of resources
     * 
     */
    
    function getData(){
        $query = "SELECT ID,NAME,VOTE,CREATION_DATE FROM resources";
        $forged_query = $query . " WHERE";
        $flag = false;    
        if(isset($_GET[RESOURCE_LIVING])){
            $flag = true;
            $forged_query = $forged_query . " LIVING=true";
        }        
        if(isset($_GET[RESOURCE_ACADEMIC])){
            if($flag){
                $forged_query = $forged_query . " AND";
            }
            else{
                $flag = true;
            }
            $forged_query = $forged_query . " ACADEMIC=true";
        }
        if(isset($_GET[RESOURCE_TECHNICAL])){
            if($flag){
                $forged_query = $forged_query . " AND";
            }
            else{
                $flag = true;
            }
            $forged_query = $forged_query . " TECHNICAL=true";
        }
        if($flag){
            $query = $forged_query;
        }

        /**
         * @TODO: search bar nmm
         */

        $query = $query . " ORDER BY CREATION_DATE DESC";
        
        $stmt = $this->conn->prepare($query);
        if(!$stmt->execute()){
            echo "database fault";
            $stmt->close();
        }
        $stmt->bind_result($id, $name, $vote, $creation_date);
        $stmt->store_result();
        if($stmt->num_rows > 0) {
            echo '<ul class="list-group">';
            while($stmt->fetch()){
                echo '<li class="list-group-item">';
                $timestamp = strtotime($creation_date);
                echo '<div class="media">';
                echo '<div class="media-body">';
                echo '<span class="media-meta pull-right">' . date("m-d-Y", $timestamp) . '</span>';
                echo '<h4><a class="resource_title" href="/uploads/' . strval($id) . '">' . $name;
                echo '</a><span class="badge pull-right">' . strval($vote) . '</span></h4>';
                echo '</div>';
                echo '</div>';
                echo '</li>';

            }
            echo "</ul>";
        }
        else {
            echo '<h3>Sorry, we do not have any resources that meet your requirement. Please change your filter </h3>';
        }
            $stmt->close();
        

        
    }

    

    function uploadResourcePage(){
        
        
    }

    /**
     * function to populate resource list
     */
    function populatePage(){
        echo'<div class="main-body">';
        //checkbox
        echo '<div>';
        echo '<ul class="list-inline">';
        echo '<li><label>'. RESOURCE_LIVING .'</label><input type="checkbox" unchecked data-toggle="toggle" data-on="Filter" data-off="Ignore" data-onstyle="success" data-offstyle="danger" name="' . RESOURCE_LIVING . '" id="' . RESOURCE_LIVING . '" value="" ></input></li>';
        echo '<li><label>'. RESOURCE_TECHNICAL .'</label><input type="checkbox" unchecked data-toggle="toggle" data-on="Filter" data-off="Ignore" data-onstyle="success" data-offstyle="danger" name="' . RESOURCE_TECHNICAL . '" id="' . RESOURCE_TECHNICAL . '" value="" ></input></li>';
        echo '<li><label>'. RESOURCE_ACADEMIC .'</label><input type="checkbox" unchecked data-toggle="toggle" data-on="Filter" data-off="Ignore" data-onstyle="success" data-offstyle="danger" name="' . RESOURCE_ACADEMIC . '" id="' . RESOURCE_ACADEMIC . '" value="" ></input></li>';
        echo '</ul>';
        echo '<br/><button type="button" id="refresh">Refresh</button>';
        echo '</div>';
        
        echo '<div id="resourceList">';
        $this->getData();
        echo '</div>'; 
        echo '</div>';

    }


    function countAdd($id){
        $qeury = "UPDATE resources SET VOTE=VOTE+1 WHERE ID=" . strval($id);
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    } 

}
//$ss = new Resources();
//$ss->getData();

?>



