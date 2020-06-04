<?php
$servername = "localhost";
$username = "root";
$pass = "";


// Create connection
$conn = new mysqli($servername, $username, $pass);
// Check connection
if (!$conn) {
    die("Connection failed");
}
if(!mysqli_select_db($conn,"secretdiary")){
    die("database not found");
}

?>