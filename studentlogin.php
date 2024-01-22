<?php
ob_start ();
session_start();
require "php/config.php";
require_once "php/functions.php";
$user = new login_registration_class();
if($user->getsession()){
	header('Location: st_profile.php');
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
    body{
        background-image: url(img/bg2.jpg);
        background-size:cover;
    }
    .main-content{
        position: relative;
        top:250px;
    }
    .loginform{
        position: relative;
        top:80px;
    }
</style>
<body>
    <div class="container">
        <div class="row main-content">
            <div class="col-md-6 loginform">
            <div class="card p-3">
            <div class="card-body">
            <?php
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						$st_id	  = $_POST['st_id'];
						$st_pass = $_POST['st_pass'];

						if(empty($st_id) or empty($st_pass)){
							echo "<p style='color:red;text-align:center;'>Field must not be empty.</p>";
						}else{
							$st_pass = md5($st_pass);
							$login = $user->st_userlogin($st_id, $st_pass);
							if($login){
								header('Location: st_profile.php');
							}else{
								echo "<p style='color:red;text-align:center'>Incorrect Student ID or password</p>";
							}
						}
					}
				?>
				
            <form action="" method="post">
                <div class="form-group">
                    <h3 class="text-center">STUDENT LOGIN</h3>
                    <label for="exampleInputEmail1">Student ID</label>
                    <input type="text" name="st_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="st_pass" class="form-control" id="exampleInputPassword1">
                </div>
                <input type="submit" value="LOGIN" class="btn btn-primary mt-2 w-100">
                <a href="studentReg.php"><p class="text-center">Register Here</p></a>
                </form>
                </div>
                </div>
            </div>
            <div class="col-md-6">
                <img src="img/student.png" alt="">
            </div>
        </div>
    </div>
   
    



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>