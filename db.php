<?php
$server = "localhost";
$username="root";
$password="";
$dbname="tests";

$conn = new mysqli($server,$username,$password,$dbname);

if(! $conn){
    echo "Database not connected";
}

?>