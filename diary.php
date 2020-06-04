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
        <button class="btn btn-success navbar-btn">Logout</button>
    </div>
</nav>
<div class="container">
<div class="row">
<div class="col-sm-12 mx-auto mt-5 diaryborder">

<form action="javascript:void(0)">
  <textarea type="text"  name="txtarea" class="textareastyle" id="textarea">
</textarea>
    <input type="hidden" class="form-control" id="projectid" name="projectid">
    <div id="autosave"></div>
</form>

</div>
<!--close col-md-5-->
</div>
<!--close row-->
</div>
<!--close container-->
<script>
    function autosave()
    {
        var textarea = $("#textarea").val();
        var projectid = $("#projectid").val();

        if(textarea!=""){
            $.ajax({
                url:"fetch.php",
                method:"POST",
            data:{t:textarea,p:projectid},
            dataType:"TEXT",
                success:function(data){
                    if(data!="")
                    {
                        $("#projectid").val(data);
                    }
                    alert("data save");
                    $("autosave").text("data save successfully");
                } /*success*/

            })

        }
    }

    setInterval(function() {
        autosave();
        setInterval(function () {
            $("autosave").text(" ")
        }, 3000);
    },5000)
</script>

<!--   <script src="JS/jquery-3.5.1.min.js"></script>-->
</body>
</html>