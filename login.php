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
          
            <p class="subheading">Login your Username and password</p>
        </div>
<form>
<div class="form-group">
<input type="email" id="email" class="form-control email " placeholder="Your Email"/>

</div>
<!--close form-group-->
<div class="form-group">
<input type="password" id="password" class="form-control password" placeholder="Your Password"/>
</div>
<!--close form-group-->
<div class="form-group">
    <input type="checkbox" class="form-group" id="exampleCheck1">
    <label class="form-group subheading" for="exampleCheck1">Stay logged in</label></div>

<div class="form-group" style="margin-top:-20px">
<button type="button" class="btn btn-success form-group subheading"  id="login">Log In!</button>
</div>
<!--close form-group-->
<div class="form-group" style="margin-top:-20px">
<a href="./index.php" style="font-size:18px;font-weight:bold !importent">Sign up </a>
</div>
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