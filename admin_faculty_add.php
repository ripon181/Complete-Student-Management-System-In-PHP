<?php
	session_start();
	require "php/config.php";
	require_once "php/functions.php";
	$user = new login_registration_class();
	$admin_id = $_SESSION['admin_id'];
	$admin_name = $_SESSION['admin_name'];
	if(isset($_REQUEST['id'])){
		$st_id = $_REQUEST['id'];
	}
	
	if(!$user->get_admin_session()){
		header('Location: index.php');
		exit();
	}
?>
<?php 
$pageTitle = "Student Details";
include "php/headertop_admin.php";
?>

<body>
<div class="container">
        <div class="row main-content">
            <div class="loginform" style="width:800px; margin:0 auto;">
            <div class="card p-3">
            <div class="card-body">
           
           
		<h2 style="text-align:center;">Faculty Registration</h2>
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
								echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>Faculty Added Complete !!</h3>";
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
        </div>
    </div>

</body>
</html>
