<?php

require_once 'mysql.php';

class Congen{

	function proj_content($time,$category,$seesawoption)
	{
		$projArray = array();	
		//Returning topic names as they are in the database		
		$mysql = new Mysql();
               
               $projArray = $mysql->return_proj_info($time,$category,$seesawoption);
		//This next portion pulls in the array generated in php and outputs the Javascript code 
		//Converts the project from php database to Javascript variables
				
           // return $mysql->return_proj_info($time,$category);
                $js_array = json_encode($projArray);//$projinfoArray is index 2
	
               
                echo "projinfoArrayjs = ".$js_array . ";\n";
                
	}	

	function recent_content()
	{
		$projArray = array();	
		//Returning topic names as they are in the database		
		$mysql = new Mysql();
               //The only updates that matter here are non related to the work resume
               $seesawoption = 'life';
               $projArray = $mysql->return_recent_info($seesawoption);
		//This next portion pulls in the array generated in php and outputs the Javascript code 
		//Converts the project from php database to Javascript variables
				
           // return $mysql->return_proj_info($time,$category);
                $js_array = json_encode($projArray);//$projinfoArray is index 2
                echo "projinfoArrayjs = ".$js_array . ";\n";
	}

}

?>