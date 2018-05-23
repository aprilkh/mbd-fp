<?php
$host = '127.0.0.1';
$user = 'root';
$pass = '';
$db = 'FP';

$sqlconnect = new mysqli($host, $user, $pass, $db) or die("tida bisa connect");
error_reporting(E_ALL ^ E_NOTICE);
?>