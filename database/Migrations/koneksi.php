<?php 
/*
 * 
 * Database toko baju, celena, topi, sepatu, dll 
 * 
*/

$host = "127.0.0.1";
$user = "root";
$pass = "";
$db = "market";
$port = "3306";

$con = mysqli_connect($host,$user,$pass,$db,$port);

if(!$con){
    die("Connection database failed : ".mysqli_connect_errno());
}
?>