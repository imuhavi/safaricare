<?php

$serverName = "localhost";
$dBUserName = "gab";
$dBPassword = "pass123";
$dBName = "project";

$conn = mysqli_connect($serverName,$dBUserName,$dBPassword,$dBName);

if(!$conn){
    die("connection failed: " . mysqli_connect_error());
}

