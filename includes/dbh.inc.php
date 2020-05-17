<?php

$serverName = "localhost";
$dBUser = "root";
$dBPwd = "";
$dBName = "cjbd";

$conn = mysqli_connect($serverName, $dBUser, $dBPwd, $dBName);

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}