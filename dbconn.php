<?php
$host = "localhost";
$dbname = "file-upload";
$username = "root";
$password = "";


$conn = mysqli_connect($host, $username, $password, $dbname);


if (!$conn) {
    die("connection error :" . mysqli_connect_error());
}
else{
   // echo "connection successful";
}  


?>
