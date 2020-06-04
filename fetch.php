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
if($_POST["i"!=""]){
    $sql = "UPDATE `notes` SET `message`='". $_POST["textarea"]."'  WHERE id='".$_POST["i"]."'";

     mysqli_query($conn, $sql);
    mysqli_close($conn);


}
else {
    $sql = "INSERT INTO `notes` (email`, `password`, `message`) VALUES ('abcde@gmail.com', '123456', '" . $_POST["textarea"] . "');";

    mysqli_query($conn, $sql);
    echo mysqli_insert_id($conn);
}
$conn->close();
?>