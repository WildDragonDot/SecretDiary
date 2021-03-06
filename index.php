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
<div class="container"><!--container start-->
<div class="row"><!--row start-->
<div class="col-md-5 mx-auto formmain"><!--col-md-5 start-->
    <div class="cardstyle"><!--cardstyle start-->
        <div >
            <h1 class="cardtopheading">Secret Diary</h1>
            </div>
        <div class="cardbody"> <!--cardbody start-->
            <h2 class="cardhead">Store your thought permanently and securely.</h2><br/>
            <div class="alert alert-danger" role="alert" id="warn" style="display: none">
               Already User, Please Log in.
            </div>
            <p class="subheading">Interested? Sign up now</p>
        </div><!--cardbody end-->
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

        $sql="SELECT email,password FROM user";
        $result=mysqli_query($conn,$sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if( $row["email"]==$emailadd)
                {
                    echo"<script>document.getElementById('warn').style.display = 'block';</script>";

                }

                else
                {
                    $sql = "INSERT INTO `user` (`email`,`password`) VALUES ('$emailadd','$passadd');";

                    if (mysqli_query($conn, $sql)) {
                        echo "Submitted";
                    } else {
                        die(mysqli_error($conn));
                    }


                    mysqli_close($conn);
                    header("location: login.php");
                }
            }
        }


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
