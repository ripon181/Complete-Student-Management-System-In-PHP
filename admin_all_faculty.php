<?php
	ob_start ();
	session_start();
	require "php/config.php";
	require_once "php/functions.php";
	$user = new login_registration_class();
	$admin_id = $_SESSION['admin_id'];
	$admin_name = $_SESSION['admin_name'];
	if(!$user->get_admin_session()){
		header('Location: index.php');
		exit();
	}
	if(isset($_POST['delete_faculty'])){
		$faculty_id = $_POST['faculty_id'];
	
		$delete_result = $user->delete_faculty($faculty_id);
		if($delete_result){
			header('Location: admin_all_faculty.php?res=1');
			exit();
		} else {
			// Display an error message if the deletion failed
			echo "<h3 style='color:red;text-align:center;margin:0;padding:10px;'>Failed to delete faculty</h3>";
		}
	}
	
?>
<?php 
$pageTitle = "All student details";
include "php/headertop_admin.php";
?>
<div class="all_student">
	<div class="search_st">
		<div class="hdinfo"><h3>All Registered Faculty List</h3>
	
	</div>
		
		<div class="search">
		<form action="admin_search_student.php" method="GET">
		<a href="admin_faculty_add.php" style="text-decoration: none;background-color: #43006f;padding: 6px;border-radius: 3px;color: #fff;">Add Faculty</a>
			<input type="text" name="src_student" placeholder="search Faculty" />
			<input type="submit" value="Search" />
		</form>
		</div>
	</div>
		<?php
			if(isset($_REQUEST['res'])){
				if($_REQUEST['res']==1){
					echo "<h3 style='color:green;text-align:center;margin:0;padding:10px;'>Data deleted successfully</h3>";
				}
			}
			
		?>
		<table class="tab_one">
			<tr>
				<th>SL</th>
				<th>Name</th>
				<th>Email</th>
				<th>Contact</th>
				<th>View Details</th>
				<th>Edit</th>
				<th>Delete</th>
				<th>Photo</th>
			</tr>
			<?php 
			$i=0;
				$alluser =$user->get_faculty();
				
				while($rows = $alluser->fetch_assoc()){
				$i++;
			?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $rows['name'];?></td>
				<td><?php echo $rows['email'];?></td>
				<td><?php echo $rows['contact'];?></td>
				<td><a href="admin_single_faculty.php?id=<?php echo $rows['id'];?>">View Details</a></td>
				<td><a href="admin_single_faculty_update.php?id=<?php echo $rows['id'];?>">Edit</a></td>
				<td>
            <form action="" method="post" onsubmit="return confirm('Are you sure you want to delete this faculty member?')">
                <input type="hidden" name="faculty_id" value="<?php echo $rows['id']; ?>">
                <button type="submit" name="delete_faculty" class="delete-btn">Delete</button>
            </form>
        </td>
				<td><img src="img/faculty/<?php echo $rows['img'];?>" width="50px" height="50px" title="<?php echo $rows['name'];?>" /></td>
			</tr>
			<?php } ?>
		</table>

		<style>
			.delete-btn{
				text-decoration: none;
				background-color: #43006f;
				padding: 6px;
				border-radius: 3px;
				color: #fff;
			}
		</style>
</div>
<?php include "php/footerbottom.php";?>
<?php ob_end_flush() ; ?>