


<?php 
function fooo(){

    include("template.php");
}


require_once($_SERVER["DOCUMENT_ROOT"] . '/config.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/lib/db_interface.php');


define('RESOURCE_LIVING', "living");
define('RESOURCE_ACADEMIC', "academic");
define('RESOURCE_TECHNICAL', "technical");

/* definitions
 */

/*
 * A class for resources page
 */


class Resources {

    /*t*
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
        $query = "SELECT ID,NAME,VOTE,CREATION_DATE,LIVING,ACADEMIC,TECHNICAL,IS_EXTERNAL,EXTERNAL_URL FROM resources";
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
        $stmt->bind_result($id, $name, $vote, $creation_date, $living, $academic, $technical, $is_external, $external_url);
        $stmt->store_result();
        if($stmt->num_rows > 0) {
            echo '<ul class="list-group">';
            while($stmt->fetch()){
                echo '<li class="list-group-item">';
                $timestamp = strtotime($creation_date);
                echo '<div class="media">';
                echo '<div class="media-body">';
                echo '<span class="media-meta pull-right">' . date("m-d-Y", $timestamp) . '</span>';
                if($living){
                    echo '<span class = "label label-default">living</span>';
                }
                if($academic){
                    echo '<span class = "label label-default">academic</span>';
                }
                if($technical){
                    echo '<span class = "label label-default">technical</span>';
                }
                if($is_external){
                
                echo '<h4><a class="resource_title" href="'. $external_url . '" onclick="trackOutboundLink(\'' . $external_url . '\'); return false; ">' . $name . '</a>';
                }
                else{
                    echo '<h4><a class="resource_title" href="./uploads/' . strval($id) . '">' . $name . '</a>';
                }
                //echo '<span class="badge pull-right">' . strval($vote) . '</span>';
                echo '</h4>';
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
/*       echo '<div>';
        echo '<ul class="list-inline">';
        echo '<li><label>'. RESOURCE_LIVING .'</label><input type="checkbox" unchecked data-toggle="toggle" data-on="Filter" data-off="Ignore" data-onstyle="success" data-offstyle="danger" name="' . RESOURCE_LIVING . '" id="' . RESOURCE_LIVING . '" value="" ></input></li>';
        echo '<li><label>'. RESOURCE_TECHNICAL .'</label><input type="checkbox" unchecked data-toggle="toggle" data-on="Filter" data-off="Ignore" data-onstyle="success" data-offstyle="danger" name="' . RESOURCE_TECHNICAL . '" id="' . RESOURCE_TECHNICAL . '" value="" ></input></li>';
        echo '<li><label>'. RESOURCE_ACADEMIC .'</label><input type="checkbox" unchecked data-toggle="toggle" data-on="Filter" data-off="Ignore" data-onstyle="success" data-offstyle="danger" name="' . RESOURCE_ACADEMIC . '" id="' . RESOURCE_ACADEMIC . '" value="" ></input></li>';
        echo '</ul>';
        echo '<br/><button type="button" id="refresh">Refresh</button>';
        echo '</div>';
        */
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

/*
Following functions are for modification of the contents
 */
    /**
     * @param  string $name      The name of the resource, less than 128 bytes
     * @param  int    $priority  priority of the resource
     * @param  bool   $living    whether it belongs to this category (0 or 1) 
     * @param  bool   $academic  whether it belongs to this category (0 or 1)
     * @param  bool   $technical whether it belongs to this category (0 or 1)
     * @param  bool   $is_external whether it links to external url
     * @param string  $external_url the external url
     * @return int    0          Fail
     *                other      id of the resource
     */
    function insertData($name, $priority, $living, $academic, $technical, $is_external, $external_url) {
        $query = "INSERT INTO resources (NAME, PRIORITY, LIVING, ACADEMIC, TECHNICAL, IS_EXTERNAL, EXTERNAL_URL) VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssssss", $name, $priority, $living, $academic, $technical, $is_external, $external_url);
        if(!$stmt->execute()){
            echo "fail to store the data, please inspect your input!";
            $stmt->close();
            return 0;
        }
        echo "Success!";

        $stmt->close();
        echo "the id is ".strval($this->conn->insert_id);
        return $this->conn->insert_id;


    }



}
//$ss = new Resources();
//$ss->getData();

?>




