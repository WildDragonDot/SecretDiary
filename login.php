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
            <div class="alert alert-danger" role="alert" id="warn" style="display: none">
               There was an error(s) in your form:<br>
                Please check your email and password
            </div>
            <p class="subheading">Login your Username and password</p>
        </div>
<form action="" name="loginform" method="post">
<div class="form-group">
<input type="email" id="email" class="form-control email " placeholder="Your Email" name="emailid" required/>

</div>
<!--close form-group-->
<div class="form-group">
<input type="password" id="password" class="form-control password" placeholder="Your Password" name="passwordid" required/>
</div>
<!--close form-group-->
<div class="form-group">
    <input type="checkbox" class="form-group" id="exampleCheck1">
    <label class="form-group subheading" for="exampleCheck1">Stay logged in</label></div>

<div class="form-group" style="margin-top:-20px">
<button type="submit" class="btn btn-success form-group subheading"  id="login" name="login">Log In!</button>
</div>
<!--close form-group-->
<div class="form-group" style="margin-top:-20px">
<a href="./index.php" style="font-size:18px;font-weight:bold !importent">Sign up </a>
</div>
    <?php include "connect.php";
    if(isset($_POST["login"]))
    {
        $em = $_POST['emailid'];
        $pas = $_POST['passwordid'];
        //----sql-------//
        $sql="SELECT id,email,password FROM user";
        $result=mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
               if( $row["email"]==$em && $row["password"]==$pas)
               {
                   $_SESSION['email']=$em;
                    $_SESSION['password']=$pas;
                   $_SESSION['id']=$row['id'];
                  header('location: diary.php');
               }else
               {
                   echo"<script>document.getElementById('warn').style.display = 'block';</script>";
               }
            }
        }

        //------sql end---------//
    }
    mysqli_close($conn);

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
   <script src="./app.js"></script>
</body>
</html>
<?php ob_flush();
?>