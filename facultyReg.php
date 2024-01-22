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
           
            <div class="st_reg fix">
		<h2 class="text-center">Faculty Registration</h2>
		<p class="msg">
		<?php
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						$st_name = $_POST['st_name'];
						$uname = $_POST['uname'];
						$st_pass = $_POST['st_pass'];
						$st_email = $_POST['st_email'];
						
						$BirthMonth = $_POST['BirthMonth'];
						$BirthDay	 = $_POST['BirthDay'];
						$BirthYear	 = $_POST['BirthYear'];
						$bday = "{$BirthYear}-{$BirthMonth}-{$BirthDay}";
						$st_gender  = $_POST['gender'];
						
						$degree = $_POST['degree'];
						$dept = $_POST['dept'];
						$subt = $_POST['subt'];
						$subject = $_POST['subject'];
						$inst = $_POST['inst'];
						$edu = "{$degree} in {$subject} from {$inst}";
						$st_contact  = $_POST['st_contact'];
						$st_add  = $_POST['st_add'];
						
						if(empty($st_name) or empty($uname) or empty($st_pass ) or empty($st_email) or empty($BirthMonth) or empty($BirthDay) or empty($BirthYear)or empty($degree) or empty($dept) or empty($subt) or empty($subject) or empty($inst) or empty($st_contact) or empty($st_gender) or empty($st_add)){
							echo "<p style='color:red;text-align:center'>**Field must not be empty**</p>";
						}else{
							$st_pass = md5($st_pass);
							$fct_register = $user->fct_registration($st_name,$uname,$st_pass,$st_email,$bday,$st_gender,$dept,$subt,$edu,$st_contact,$st_add);
							if($fct_register){
								echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>Faculty Registration Complete !!</h3>";
							}else{
								echo "<p style='color:red;text-align:center'>Error..username Already exists</p>";
							}
						}
					}
				?>
			
			</p>
		<form action="" method="post" id="st_form">
			<table>
				<tr>
					<th>Name: </th>
					<td><input type="text" class="form-control" name="st_name" placeholder="Full Name" required /></td>
				</tr>
				<tr>
				<tr>
					<th>Username: </th>
					<td><input type="text" class="form-control" name="uname" placeholder="username" required /></td>
				</tr>
				<tr>
					<th>Password: </th>
					<td><input type="password" class="form-control" name="st_pass" placeholder="password" required /></td>
				</tr>
				<tr>
					<th>E-mail: </th>
					<td><input type="email" class="form-control" name="st_email" placeholder="example@email.com" required /></td>
				</tr>
                                        <tr>
                            <th>Department: </th>
                            <td>
                                <fieldset>
                                    <select class="select-style form-control" name="dept">
                                        <option value="CSE">Computer Science & Engineering (CSE)</option>
                                        <option value="Electrical">Electrical & Electronic Engineering (EEE)</option>
                                        <option value="Business" >Business Administration</option>
                                        <option value="English" >English</option>
                                        <option value="Sociology" >Sociology</option>
                                        <option value="Law" >Law</option>
                                        <option value="Mathematics" >Mathematics</option>
                                        <option value="Pharmacy" >Pharmacy</option>
                                        <option value="Architecture" >Architecture</option>
                                        <option value="Economics" >Economics</option>
                                    </select> 
                                </fieldset>
                            </td>
                        </tr>

                        <th>Subject: </th>
                        <td>
                            <fieldset>
                                <select class="select-style form-control" name="subt">
                                    <option value="Fundamental">Computer Fundamental</option>
                                    <option value="English">English</option>
                                    <option value="Java" >Java</option>
                                    <option value="web" >Web Engineering</option>
                                    <option value="Physics" >Physics</option>
                                    <option value="Algorithm" >Algorithm</option>
                                    <option value="Robotics" >Robotics</option>
                                    <option value="dbms" >Database management System</option>
                                </select>
                            </fieldset>
                        </td>


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
					<th>Gender:</th>
					<td><label><input type="radio" name="gender" value="Male" checked/> Male</label>
					<label><input type="radio" name="gender" value="Female"/> Female</label>
					</td>
				</tr>
				<tr>
				<th>Education: </th>
					<td>
						<fieldset>
						  <select class="select-style form-control" name="degree">
							<option value="BSc">BSc</option>
							 <option value="MSc">MSc</option>
							  <option value="Phd" >Phd</option>
						  </select>   
							<label><input class="birthyear form-control" name="subject" placeholder="Subject" required=""></label>
							<label><input class="birthyear form-control" name="inst" placeholder="Institute" required=""></label>

						</fieldset>
					</td>
				</tr>
				<tr>
					<th>Contact:</th>
					<td><input type="text" class="form-control" name="st_contact" placeholder="phone" required /></td>
				</tr>
				<tr>
					<th>Address:</th>
					<td><input type="text" class="form-control" name="st_add" placeholder="Address" required /></td>
				</tr>
				<tr>
					<td colspan="2"><input class="btn btn-info w-50 mt-3" type="submit" name="sub" value="Add Faculty" /></td>
				</tr>
			</table>
		</form>

	</div>





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