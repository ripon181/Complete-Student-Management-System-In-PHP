<?php
ob_start ();
session_start();
require "php/config.php";
require_once "php/functions.php";
$user = new login_registration_class();
if($user->get_faculty_session()){
	header('Location: class_att_fc.php');
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
			//php for faculty login
			if($_SERVER['REQUEST_METHOD'] == "POST"){
						$username = $_POST['user'];
						$psw  = $_POST['psw'];

						if(empty($username) or empty($psw)){
							echo "<p style='color:red;text-align:center;'>Field must not be empty.</p>";
						}else{
							$psw = md5($psw);
							$login = $user->fct_login($username, $psw);
							if($login){
								header('Location: class_att_fc.php');
							}else{
								echo "<p style='color:red;text-align:center'>Incorrect Username or password</p>";
							}
						}
					}
				?>
            <form action="" method="post">
                <div class="form-group">
                    <h3 class="text-center">FACULTY LOGIN</h3>
                    <label for="exampleInputEmail1">User Name</label>
                    <input type="text" name="user" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="psw" class="form-control" id="exampleInputPassword1">
                </div>
                <input type="submit" value="LOGIN" class="btn btn-primary mt-2 w-100">
                <a href="facultyReg.php"><p class="text-center">Register Here</p></a>
                </form>
                </div>
                </div>
            </div>
            <div class="col-md-6">
                <img src="img/teacher.png" alt="">
            </div>
        </div>
    </div>
   
    



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>