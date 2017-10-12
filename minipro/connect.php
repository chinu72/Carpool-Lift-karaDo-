<?php
$servername = "localhost";
$username = "root";
$password =  "ubuntu2963";
$dbname = "carpool";
try
{
	$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  //  echo "Connected Successful!";
    
}
catch(PDOException $e)
{
    echo "MY ERROR :".$e->getMessage();
}