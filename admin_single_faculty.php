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
<div class="profile">
		<p style="font-size:18px;text-align:center;background:#1abc9c;color:#fff;padding:10px;margin:0"><?php $user->get_faculty_username($faculty_id); ?> <i class="fa fa-check-circle" aria-hidden="true"></i></p>
		<table class="tab_one">
			<?php
				$getfaculty = $user->getfacultybyid($faculty_id);
				while($row = $getfaculty->fetch_assoc()){
			?>
			<tr>
				<td></td>
				<?php if(empty($row['img'])){?>
				<td><img src="img/default.png" style="height:180px; width:180px; border:1px #1ABC9C solid;border-radius:90px" alt="" /></td>
				<?php }else{ ?>
				<td><img src="img/faculty/<?php echo $row['img']; ?>" style="height:180px; width:180px; border:1px #1ABC9C solid;border-radius:90px" alt="" /></td>
				<?php }?>
			</tr>
			<tr>
				<td>Name: </td>
				<td><?php echo $row['name']; ?></td>
			</tr>
			<tr>
				<td>E-mail: </td>
				<td><?php echo $row['email']; ?></td>
			</tr>
			<tr>
				<td>Department: </td>
				<td><?php echo $row['dept']; ?></td>
			</tr>
			<tr>
				<td>Subject: </td>
				<td><?php echo $row['subt']; ?></td>
			</tr>
			<tr>
				<td>Contact: </td>
				<td><?php echo $row['contact']; ?></td>
			</tr>
            <tr>
				<td>Education: </td>
				<td><?php echo $row['education']; ?></td>
			</tr>
            <tr>
				<td>Date Of Birth: </td>
				<td><?php echo $row['birthday']; ?></td>
			</tr>
			<tr>
				<td>Gender: </td>
				<td><?php echo $row['gender']; ?></td>
			</tr>
			<tr>
				<td>Address: </td>
				<td><?php echo $row['address']; ?></td>
			</tr>
			<tr>
				<td>Update Profile: </td>
				<td><a href="admin_single_faculty_update.php?id=<?php echo $row['id'];?>"><button class="editbtn">Edit Profile</button></a></td>
			</tr>
			<?php  } ?>
		</table>
		<div class="back fix">
			<p style="text-align:center"><a href="admin_all_faculty.php"><button class="editbtn">Back to faculty list</button></a></p>
		</div>

</div>

<?php include "php/footerbottom.php";?>
