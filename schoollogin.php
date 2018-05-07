<?php
/*$username = $password = $rpassword = $Email = $Department = $faculty = "";
$usernameError = $passwrdError = $EmailEroor = $DepartmentError = $facultyError = "";*/
$conn = mysqli_connect('localhost','root','','esutPortal');
$successmessage = "<div class='alert alert-sucess'>
      Registration Successful!
    </div>";;
   if(isset($_POST['register']))
   {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $department = $_POST['department'];
    $faculty = $_POST['faculty'];
  
      $qry = "INSERT INTO esutPortal (username, password, email, department, faculty ) VALUES('$username', '$password','$email', '$department', '$faculty')";

        $rslt = mysqli_query($conn, $qry);
        if($rslt){
          echo $successmessage;
        }
        else{
          echo("oops!");
        }
      }
if  ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["uname"]))
      {
            $usernameError = "<div class='alert alert-danger'>
              Please enter a valid reg num
             </div>";
      } 
      if (empty($_POST["password"]))  
      {
            $passwordError = "<div class='alert alert-danger'>
             Enter a valid password
            </div>";
    }
    
    if (empty($_POST["email"])) 
    {
        $EmailError = "<div class='alert alert-danger''>
      Please enter a valid email account
    </div>";
    }
    if (empty($_POST["Dept"])) 
    {
        $DepartmentError = "<div class='alert alert-danger'>
      Please enter a an accredited Department
    </div>";
    }
    if (empty($_POST["faculty"])) 
    {
        $facultyError = "<div class='alert alert-danger'>
      Please enter a Faculty that exists in the school
    </div>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>School login page</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
     <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/schoollogin.css">
<style>  
body{
    font-family: Arial, Helvetica, sans-serif;
    background-repeat: no-repeat;
    background-size:80%;
    background-position: scroll;
     }
    .mycarousel{
        height: 400px;  
        width:100%;
      }
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse " id="navbarNav">
    <ul class="navbar-nav head">
      <li class="nav-item active">
        <a class="nav-link" href="# active">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="" data-target="#registerModal" data-toggle="modal" data-dismiss="modal">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="" data-target="#loginModal" data-toggle="modal" data-dismiss="modal">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Admin</a>
      </li>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Staff</a>
      </li>
    </ul>
  </div>
</nav>
<!--carousel -->
<div class="carousel mycarousel" id="carouselExampleIndicators" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="calimage" src="assets/images/ESUT.jpg">
    </div> 
    <div class="carousel-item">
      <img class="calimage" src="assets/images/4.jpg">
    </div>
    <div class="carousel-item">
      <img class="calimage" src="assets/images/2.jpg">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!--end carousel -->


<!--begin modal -->
<div class="modal fade in" id="loginModal">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
        </div>
        <img src="assets/images/IMG-20170713-WA0018.jpg" height="20px" width="40px">
        <h4 style="text-align: center;">Login Form</h4>

        <div class="modal-body">
         <form method="post" action="schoollogin.php">
            <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Reg Num" name="username"  value=""><br><br>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password"  value=""><br><br>
        
      <button type="submit" class="btn btn-success">Login</button><br>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw"><a href="#"> forgot password?</a></span>
    </div>
  </form>
</div>
</div>
</div>
</div>
<!--registration modal -->

<div class="modal fade in" id="registerModal">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
        </div>
        <div class="modal-body">
         <form method="post" action="schoollogin.php">
            <div class="container">
      <label for="uname"></label>
      <input type="text" placeholder="Enter Reg Num" name="username"  value=""><br>

      <label for="psw"></label>
      <input type="password" placeholder="Enter password" name="password"  value=""><br>

       <label for="psw"></label>
      <input type="text" placeholder="@gmail.com" name="email" value=""><br>

       <label for="Dept"></label>
      <input type="text" placeholder="Enter Department" name="department"  value=""><br>

       <label for="fct"></label>
      <input type="text" placeholder="Enter Faculty" name="faculty"  value=""><br>
        
      <button type="submit" class="btn btn-success" text-align="center" name="register" onclick="document.getElementById('demo').innerHTML=MyFunction()">Register</button>
      <p id='demo'></p>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
      <script>
        function MyFunction() {
        document.getElementById('demo').innerHTML="<div class='alert alert-sucess'> Registration Successful </div>;>"
     }
   </script>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw"><a href="#">Forgot password?</a></span>
    </div>
  </form>
</div>
</div>
</div>
</div>
<!--end modal -->



</body>
</html>