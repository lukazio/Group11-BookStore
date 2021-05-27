<?php

$host="remotemysql.com:3306";
$dbUsername="h8DqZV7y33";
$dbPassword="729x6UaerS";
$dbName="h8DqZV7y33";

$conn = mysqli_connect($host,$dbUsername,$dbPassword,$dbName);

if (!$conn){
	die("Connection failed: ".mysqli_connect_error());
}