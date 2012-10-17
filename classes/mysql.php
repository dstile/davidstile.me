<?php

define('DB_SERVER', "localhost");
define('DB_USER', "root");
define('DB_PASSWORD', "Flight1");
define('DB_NAME', "SimpleMember");

class Mysql {

    private $conn;

    function __construct() {
        $this->conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or die('Issue connecting to the DB.');    //when referring to a property we do not need the '$'
    }

//will need to update variables for locallongmin, etc once it is fed in from a map program
    function return_proj_info($time, $category, $seesawoption) {
        /* Preparing selection statement */

        $relprojects = array();
        $query = "SELECT * FROM posts WHERE category='" . $category . "' AND time_classification='" . $time . "'AND seesawoption='" . $seesawoption . "'ORDER BY datesequence DESC";

        if ($result = $this->conn->query($query)) {

            while ($myrow = $result->fetch_array()) {
                $relprojects[] = $myrow;
            }
            $result->close();
        }
        /* close statement */

        //return $relprojects;
        return $relprojects;
    }

}

?>