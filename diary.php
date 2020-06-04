<?php
ob_start();
session_start();
if(!isset($_SESSION['email']))
    header('location:index.php');
?>
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/style.css"/>
    <title>Signup</title>
</head>

<body>
<nav class="navbar navbar-inverse" style="background: #fff">
    <div class="container-fluid">
        <div class="navbar-header">
            <h3 style="color: #626262">Secret Diary</h3>
        </div>
        <a href="logout.php" class="btn btn-success navbar-btn" name="logout"> Logout</a>
    </div>
</nav>
<div class="container">
<div class="row">
<div class="col-sm-12 mx-auto mt-5 diaryborder">

<form action="javascript:void(0)">
  <textarea type="text"  name="textarea" class="textareastyle" id="textarea">
</textarea>
    <input type="hidden" class="form-control" id="post_id" name="post_id">
    <div id="autosave"></div>
</form>

</div>
<!--close col-md-5-->
</div>
<!--close row-->
</div>
<!--close container-->
<script>
    $(document).ready(function(){

        function autosave()
    {
       var textarea = $("#textarea").val();
        var post_id = $("#post_id").val();
        if(textarea != ""){
            $.ajax({
                url:"diary.php",
                method:"POST",
            data:{t:textarea,p:post_id},
            dataType:"TEXT",
                success:function(data){
                    if(data!="")
                    {
                        $("#post_id").val(data);
                    }
                    $("#autosave").text("");
                    setInterval(function(){
                        $('#autosave').text('');
                    },1000);
                } /*success*/

            });

        }
    }
        setInterval(function(){
            autosave();
        },1000);

    });

</script>
 <?php
 include "connect.php";

 $email = $_SESSION['email'];
 $password = $_SESSION['password'];
 $id = $_SESSION['id'];
 if($email==""||$password=="")
 {
 mysqli_close($conn);
 }
else
{
 if($_POST["p"]!=''){
//update
     $sql="UPDATE `notes` SET `message`='".$_POST["t"]."' WHERE `id`=$id";
     if (mysqli_query($conn, $sql)) {
         echo "Updated";
     } else {
         die(mysqli_error($conn));
     }
     mysqli_close($conn);
 }
 else {
         $sql = "INSERT INTO `notes` (`id`, `email`, `password`, `message`) VALUES ('$id', '$email', '$password', '".$_POST["t"]."');";

         if (mysqli_query($conn, $sql)) {
             echo "Submitted";
         } else {
             die(mysqli_error($conn));
         }
         mysqli_close($conn);

 }
 }
    ?>
<!--   <script src="JS/jquery-3.5.1.min.js"></script>-->
</body>
</html>

<?php ob_flush();
?>