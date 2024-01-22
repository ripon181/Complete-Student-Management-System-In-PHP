<?php
	session_start();
	require "php/config.php";
	require_once "php/functions.php";
	$user = new login_registration_class();
	$admin_id = $_SESSION['admin_id'];
	$admin_name = $_SESSION['admin_name'];
	if(isset($_REQUEST['id'])){
		$faculty_id = $_REQUEST['id'];
	}else{
		header('Location: admin.php');
		exit();
	}
	
	if(!$user->get_admin_session()){
		header('Location: index.php');
		exit();
	}
?>
<?php 
$pageTitle = "Faculty Details";
include "php/headertop_admin.php";
?>
 <script>
    function PreviewImage(upname, prv_id) {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementsByName(upname)[0].files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById(prv_id).src = oFREvent.target.result;
        };
    };
  
</script>

<div class="profile">
			<h3 style="font-size:18px;text-align:center;background:#1abc9c;color:#fff;padding:10px;margin:0">Update Profile</h3>							
				<?php
						$qry=$user->getfacultybyid($faculty_id);
						$pic=$qry->fetch_assoc();
						$piclocation=$pic['img'];
						
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						//code for img
						function guid() {
								 if (function_exists('com_create_guid')) {
											return com_create_guid();
										} else {
											mt_srand((double) microtime() * 10000); //optional for php 4.2.0 and up.
											$charid = strtoupper(md5(uniqid(rand(), true)));
											$hyphen = chr(45); // "-"
											$uuid = chr(123)// "{"
													. substr($charid, 0, 8) . $hyphen
													. substr($charid, 8, 4) . $hyphen
													. substr($charid, 12, 4) . $hyphen
													. substr($charid, 16, 4) . $hyphen
													. substr($charid, 20, 12)
													. chr(125); // "}"
											return $uuid;
										}
							  }
								if($_FILES["personal_image"]["name"])
								{
									  $path_parts = pathinfo($_FILES["personal_image"]["name"]);
												  $ext = $path_parts['extension'];
												  $fileName = trim(guid(), '{}') . '.' . $ext;
								}
								else{
									$fileName = $piclocation;
								}

							move_uploaded_file($_FILES['personal_image']['tmp_name'], "img/faculty/$fileName");

													
						//end img 
						$f_name = trim($_POST['f_name']);
						$f_email = trim($_POST['f_email']);
						$f_dept = trim($_POST['f_dept']);
						$f_subt = trim($_POST['f_subt']);
						$f_gender = trim($_POST['f_gender']);
						$f_contact = trim($_POST['f_contact']);
						$f_add = trim($_POST['f_add']);
					
						if (empty($f_name) || empty($f_email) || empty($f_dept) || empty($f_subt) || empty($f_gender) || empty($f_contact) || empty($f_add)) {
							echo "<p style='color:red;text-align:center'>Field must not be empty.</p>";
						}else{
							$update = $user->update_faculty_profile($faculty_id, $f_name, $f_email, $f_dept, $f_subt, $f_gender, $f_contact, $f_add, $fileName);
							if($update){
								echo "<h4 style='color:green;text-align:center'>Information Updated successfully</h4>";
							}else{
								echo "<h4 style='color:red;text-align:center;text-align:center'>Failed to update</h4>";
							}
						}
					}
				?>
			
			<div class="st_update fix">
				<form action="" method="post" enctype="multipart/form-data">
						<?php
						$result = $user->getfacultybyid($faculty_id);
						while($row = $result->fetch_assoc()){
						?>
					<table class="tab_one" >
						<tr>
							<td style="width:250px;"></td>
							<td>Photo</td>
							<td>
							<img id="logo_preview" src="img/faculty/<?php echo $row['img']?>" style="height:150px; width:150px; border:1px green solid;"><br><br> 
							<input type="file" name="personal_image" id="spic" onchange="PreviewImage('personal_image', 'logo_preview')" />
							</td>
						</tr>
						<tr>
							<td style="width:125px;"></td>
							<td>Name:</td>
							<td><input type="text" name="f_name" value="<?php echo $row['name'];?>"></td>
						</tr>
						<tr>
							<td style="width:125px;"></td>
							<td>E-mail:</td>
							<td><input type="email" name="f_email" value="<?php echo $row['email']; ?>"></td>
						</tr>
						<tr>
							<td style="width:125px;"></td>
							<td>Department:</td>
							<td><input type="text" name="f_dept" value="<?php echo $row['dept']; ?>"></td>
						</tr>
						<tr>
							<td style="width:125px;"></td>
							<td>Subject:</td>
							<td><input type="text" name="f_subt" value="<?php echo $row['subt']; ?>"></td>
						</tr>
						<tr>
							<td style="width:125px;"></td>
							<td>Gender:</td>
							<td><input type="text" name="f_gender" value="<?php echo $row['gender']; ?>"></td>
						</tr>
						<tr>
							<td style="width:125px;"></td>
							<td>Contact:</td>
							<td><input type="text" name="f_contact" value="<?php echo $row['contact']; ?>"></td>
						</tr>
                        <tr>
							<td style="width:125px;"></td>
							<td>Education:</td>
							<td><input type="text" name="f_education" value="<?php echo $row['education']; ?>"></td>
						</tr>
                        <tr>
							<td style="width:125px;"></td>
							<td>Date Of Birth:</td>
							<td><input type="text" name="f_birthday" value="<?php echo $row['birthday']; ?>"></td>
						</tr>
						<tr>
							<td style="width:125px;"></td>
							<td>Address:</td>
							<td><input type="text" name="f_add" value="<?php echo $row['address']; ?>"></td>
						</tr>
						<tr>
						<td style="width:125px;"></td>
						<td></td>
						<td colspan="2">
							<input style="background:#3498db;color:#fff;width:168px;border-radius:5px;" type="submit" name="Update" value="Update">
							</td>						
						</tr>
					</table>
						<?php } ?>
				</form>
			</div>
			<div class="back fix">
				<p style="text-align:center"><a href="admin_all_faculty.php"><button class="editbtn">Back to Faculty Profile</button></a></p>
			</div>
</div>

<?php include "php/footerbottom.php";?>
