<?php

//Define constants here

$hostname = gethostname();    

if ($hostname == 'dstile-PC') {  
define('DB_SERVER', "localhost");
define('DB_USER', "dstile");
define('DB_PASSWORD', "password");
define('DB_NAME', "stilelog_sitecontent");
}
else {

define('DB_SERVER', "mysql.mrdavidstile.com");
define('DB_USER', "davestile");
define('DB_PASSWORD', "Cre8tedAm0nster");
define('DB_NAME', "stilelog_sitecontent");

}

class Mysql {

    private $conn;

    function __construct() {
        $this->conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or die('Issue connecting to the DB.');    //when referring to a property we do not need the '$'
    }

//will need to update variables for locallongmin, etc once it is fed in from a map program
    
    //for lists in the navigation pages
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


    //for list of most recent
    function return_recent_info($seesawoption) {
        /* Preparing selection statement */

        $relprojects = array();
        $query = "SELECT * FROM posts WHERE seesawoption='" . $seesawoption . "'ORDER BY datesequence DESC LIMIT 5  ";

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

      //for individual posts
    function return_individual_info($post_title) {
        /* Preparing selection statement */

        $relprojects = array();
        $query = "SELECT * FROM posts WHERE posthead = '".$post_title."'";

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