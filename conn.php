<?php
session_start();
$ser = "localhost";
$user="root";
$pas="";
$db = "ogs";
$con = mysql_connect($ser,$user,$pas);
mysql_select_db($db,$con);
?>