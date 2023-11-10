<?php
include_once '../conn.php';
session_destroy();
echo "<script>document.location='../index.php';</script>";
?>