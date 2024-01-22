<?php
session_start();
	require "php/config.php";
	require_once "php/functions.php";
	$user = new login_registration_class();
	$fid = $_SESSION['f_id'];
	$funame = $_SESSION['f_uname'];
	$fname = $_SESSION['f_name'];
	if(!$user->get_faculty_session()){
		header('Location: facultylogin.php');
		exit();
	}
?>	
<?php 
$pageTitle = "All student details";
include "php/headertop.php";
?>
<div class="admin_profile">
	
	<div class="section">
			<h3>Select Category</h3>
			<ul>
				<li><a href="admin_all_student.php">View All Student</a></li>
				<li><a href="st_result.php">Student Result</a></li>
				<li><a href="class_att.php">Attendance</a></li>
				<li><a href="admin_all_faculty.php">Faculty Details</a></li>
				<!-- <li><a href="student_list_pdf.php"><button>Download Student List</button></a></li> -->
			</ul>
	</div>
	<!-- <div class="section">
			<h3>Faculty</h3>
			<ul>
				
				<!-- <li><a href="#">Information</a></li>
				<li><a href="#">Search Faculty</a></li>
				<li><a href="faculty_list.php"><button>Download Faculty List</button></a></li> -->
			</ul>
	</div> -->
	<!-- <div class="section">
	
			<h3>Registry</h3>
			<ul>
				<li><a href="#">Accounts</a></li>
				<li><a href="#">Salary</a></li>
				<li><a href="#">Student tution fee</a></li>
				<li><a href="#">Other cost</a></li>
			</ul>

	</div> -->

</div>

<?php include "php/footerbottom.php";?>
<?php ob_end_flush() ; ?>