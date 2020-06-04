<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   <link rel="stylesheet" href="./bootstrap-4.5.0-dist/css/bootstrap.min.css"/>
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/style.css"/>
    <title>Signup</title>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-5 mx-auto formmain">
    <div class="cardstyle">
        <div >
            <h1 class="cardtopheading">Secret Diary</h1>
            </div>
        <div class="cardbody">
            <h2 class="cardhead">Store your thought permanently and securely.</h2><br/>
            <p class="subheading">Interested? Sign up now</p>
        </div>
<form action="<?php echo $_SERVER["PHP_SELF"]?>" name="dataform" method="post">
<div class="form-group">
<input type="email" id="email" class="form-control email" placeholder="Your Email" name="email" required/>
</div>
<!--close form-group-->
<div class="form-group">
<input type="password" id="password" class="form-control password" placeholder="Your Password" name="password" required/>
</div>
<!--close form-group-->
<div class="form-group">
    <input type="checkbox" class="form-group" id="exampleCheck1">
    <label class="form-group subheading" for="exampleCheck1">Stay logged in</label></div>

<div class="form-group" style="margin-top:-20px">
<button type="submit" class="btn btn-success form-group subheading" name="signup" >Sign Up!</button>
</div>
<!--close form-group-->
<div class="form-group" style="margin-top:-20px">
<a href="./login.php" style="font-size:18px;font-weight:bold !importent;">Log in </a>
</div>
    <?php include "connect.php";
    if(isset($_POST["signup"]))
    {
        $emailadd = $_POST['email'];
        $passadd = $_POST['password'];

        $sql = "INSERT INTO `user` (`email`,`password`) VALUES ('$emailadd','$passadd');";

        if (mysqli_query($conn, $sql)) {
            echo "Submitted";
        } else {
            die(mysqli_error($conn));
        }


    mysqli_close($conn);
        header("location: login.php");
    }

    ?>
</form>

<!--close card body-->
</div>
<!--close card -->
</div>
<!--close col-md-5-->
</div>
<!--close row-->
</div>
<!--close container-->

   <script src="JS/jquery-3.5.1.min.js"></script>
</body>
</html>
<?php  ob_flush(); ?>
