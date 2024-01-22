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
            <h3 class="text-center">Student Registration</h3>
            <p class="msg">
				<?php
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						$st_id   = $_POST['st_id'];
						$st_name = $_POST['st_name'];
						$st_pass = $_POST['st_pass'];
						$st_email = $_POST['st_email'];
						
						$BirthMonth = $_POST['BirthMonth'];
						$BirthDay	 = $_POST['BirthDay'];
						$BirthYear	 = $_POST['BirthYear'];
						$bday = "{$BirthYear}-{$BirthMonth}-{$BirthDay}";
						
						$st_dept  = $_POST['st_dept'];
						$st_contact  = $_POST['st_contact'];
						$st_gender  = $_POST['gender'];
						$st_add  = $_POST['st_add'];
						
						if(empty($st_id) or empty($st_name) or empty($st_pass ) or empty($st_email) or empty($BirthMonth) or empty($BirthDay) or empty($BirthYear) or empty($st_dept) or empty($st_contact) or empty($st_gender) or empty($st_add)){
							echo "<p style='color:red;text-align:center'>**Field must not be empty**</p>";
						}else{
							$st_pass = md5($st_pass);
							$st_register = $user->st_registration($st_id,$st_name,$st_pass,$st_email,$bday,$st_dept,$st_contact,$st_gender,$st_add);
							if($st_register){
								echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>Registration Complete !! <a style='font-size:20px;color:#8e44ad' href='studentlogin.php'>Login</a></h3>";
							}else{
								echo "<p style='color:red;text-align:center'>Error..Student ID or email Already exists</p>";
							}
						}
					}
				?>
			
			</p>
		<form action="" method="post" id="st_form">
			<table>
				<tr>
					<th>Name: </th>
					<td><input type="text" name="st_name" class="form-control" placeholder="Full Name" required /></td>
				</tr>
				<tr>
				<tr>
					<th>Student ID: </th>
					<td><input type="text" name="st_id" class="form-control" placeholder="Student Id" required /></td>
				</tr>
				<tr>
					<th>Password: </th>
					<td><input type="password" name="st_pass" class="form-control" placeholder="password" required /></td>
				</tr>
				<tr>
					<th>E-mail: </th>
					<td><input type="email" name="st_email" class="form-control" placeholder="example@email.com" required /></td>
				</tr>
				<tr>
					<th>Date of Birth: </th>
					<td>
						<fieldset>

						  <select class="select-style form-control" name="BirthMonth">
						  <option  value="01">Jan</option>

						<option value="02">Feb</option>

						 <option value="03" >March</option>

						  <option value="04">April</option>

						  <option value="05">May</option>

						  <option value="06">June</option>

						  <option value="07">July</option>

						 <option value="08">Aug</option>

						  <option value="09">Sep</option>

							<option value="10">Oct</option>

						 <option value="11">Nov</option>
						  <option value="12" >Dec</option>
						  </label>

						</select>   

						<label><input class="birthday form-control" maxlength="2" name="BirthDay"  placeholder="Day" required=""></label>

						<label><input class="birthyear form-control" maxlength="4" name="BirthYear" placeholder="Year" required=""></label>

					  </fieldset>
					</td>
				</tr>
				<tr>
					<th>Program:</th>
					<td><input type="text" name="st_dept" class="form-control" placeholder="BCSE,BSEEE, BBA..." required /></td>
				</tr>
				<tr>
					<th>Contact:</th>
					<td><input type="text" name="st_contact" class="form-control" placeholder="phone" required /></td>
				</tr>
				<tr>
					<th>Gender:</th>
					<td><label><input type="radio" name="gender" value="Male" checked/> Male</label>
					<label><input type="radio" name="gender" value="Female"/> Female</label>
					<label><input type="radio" name="gender" value="Other"/> Other</label>
						
					</td>
				</tr>
				<tr>
					<th>Address:</th>
					<td><input type="text" name="st_add" class="form-control" placeholder="Address" required /></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" class="btn btn-info w-50 mt-3" name="sub" value="Register" /></td>
				</tr>
			</table>
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