<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "bibliothekssystem";

$con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
if($con->connect_error){
	die("failed to connect! --- ".$con->connect_error);
}
echo "connected";
