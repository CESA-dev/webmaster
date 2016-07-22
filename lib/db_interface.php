<?php

/**
* @param servername: name of the server to use
* @param username: username to use
* @param password: password for username
* @param dbname: name of database name to go into, defaults to null and will not choose database
*
* @return returns mySQLi connection to database if successful, returns null if not
*/
function connect($servername, $username, $password, $dbname = "test"){
	if($dbname == '')
		$conn = mysqli_connect($servername, $username, $password);
	else
		$conn = mysqli_connect($servername, $username, $password, $dbname);
	if( !$conn ) {
	    return null;
	}
	else
		return $conn;
}




?>









