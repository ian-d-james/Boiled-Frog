<?php 
session_start();
ob_start();
ini_set("error_reporting", 1);

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$DB_Host = "localhost:3306";
$DB_Name="ianjames_0_boiledfrog";
$DB_Username="ianja_admin";
$DB_Password="Gabriola1957";

$con = mysql_connect($DB_Host,$DB_Username,$DB_Password) or die(mysql_errno());
$db = mysql_select_db("$DB_Name",$con) or die(mysql_error());
?>