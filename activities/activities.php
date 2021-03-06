


<?php
require_once('../config.php');
require_once('../lib/db_interface.php');




/**
 * A class to fetch the activities from the database
 */


class Activities {

    private $conn;

    /**
     * the constructor of the object, to connect with the database
     */
    function __construct(){
        /*change the parameters here
         * root is just for testing
         */
        $this->conn = connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if($this->conn == null)
            echo "Cannot connect to db";

    }

    /**
     * the function to get the data, echoing the values as json object
     * @param dataType: the type of data to get, see code for details
     */
    function getData($dataType){
        switch($dataType) {
            /* get all data*/
            case "all":
                $query = "SELECT * FROM activities";
                $stmt = $this->conn->prepare($query);
                $stmt->execute();
                $stmt->bind_result($id, $name, $time, $year);
                while ($stmt->fetch()) {
                    $arr = array('id'=>$id, 'name'=>$name,  'time'=>$time, 'year'=>$year);
                    $output[$id] = $arr;
                }

                $stmt->close();
                echo json_encode($output);
                return;
            default:
                return;
        }
        return;
    }

    /**
     * the method to insert data into activites table
     * @param name: the name of the function
     * @param year: the year of the activity
     * @param url: the url of the page
     */

    function insertData($name, $year, $url){
        $query = "INSERT INTO activities (NAME, HAPPENEDTIME, URL) VALUES (?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss", $name, $year, $url);
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

    /**
     * A function to populate the activity page.
     * @return nothing
     */
    function populateActivitiesPage() {
            echo '<ul id="grid">';
        for($y = 2016; $y >= 2014; $y--){
            $query = "SELECT * FROM activities where HAPPENEDTIME=". strval($y);

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $stmt->bind_result($id, $name, $time, $year, $url);
            while ($stmt->fetch()) {
                echo '<li><a class="grid-cell" href="'.$url.'">';
                echo '<img class="grid-img" src="uploads/'.strval($id).'/thumbnail.png">';
                echo '<span class="grid-cover"></span>';
                echo '<span class="grid-text">'.$name.'</span>';
                echo '</a>';
                echo '</li>';

            }

            $stmt->close();
        }
            echo '</ul>';
        return;


    }
    /**
     * A function to populate the carousel div
     * @return non
     */
    function populateActivitiesCarousel(){
        $query = "SELECT * FROM activities ORDER BY CREATEDATE DESC LIMIT 3";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stmt->bind_result($id, $name, $time, $year, $url);
        $first = true;
        while ($stmt->fetch()) {
            if($first){
                echo '<div class="item active">';
                $first = false;
            }
            else{
                echo '<div class="item">';
            }
            echo '<a href="'.$url.'"><img src="uploads/'.strval($id).'/thumbnail.png" class="img-responsive center-block img-ca" alt="Image Not Available"></a>';
            echo '<div class="carousel-caption">';
            echo '<h3>'.$name.'</h3>';
            echo '</div>';
            echo '</div>';
        }
        $stmt->close();
    }

}


/**
 * test here
 */

//
//$act = new Activities();
//$act->insertData("foo", "啦啦");
//$act->getData("all");
//









?>
