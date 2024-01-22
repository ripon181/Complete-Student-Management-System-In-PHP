<?php
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
?>	
<?php 
$pageTitle = "All student details";
include "php/headertop_admin.php";
?>
<div class="all_student fix">
		<h3 style="text-align:center;color:#fff;margin:0;padding:5px;background:#1abc9c">Attendance Management</h3>
		<div  class="fix" style="background:#ddd;padding:20px;">
			<span style="float:left;"><a style="color:#fff;" href="att_add.php"><button style="background:#58A85D;border:none;color:#fff;padding:10px;">Add student</button></a></span>
			<span style="float:right;"><a style="color:#fff;" href="att_view.php"> <button style="background:#58A85D;border:none;color:#fff;padding:10px;">View Attendance</button></a></span>
		</div>
		<?php
			if(isset($_REQUEST['res'])){
				echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>Data deleted successfully !</h3>";
			}
		?>
		<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$cur_date = $_POST['attndate'];
				$dept = $_POST['dept'];
				$subt = $_POST['subt'];
				$semester = $_POST['semester']; // Added this line
				$time = $_POST['attntime'];
				$atten = $_POST['attn'];
			
				$time = date("h:i A", strtotime($time));
			
				$res = $user->insertattn($cur_date, $dept, $subt, $semester, $time, $atten); // Added $semester parameter
				if ($res) {
					echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>Attendance data successfully inserted!</h3>";
				} else {
					echo "<p style='color:red;text-align:center'>Failed to insert data</p>";
				}
			}
			
		
		?>
		
	<form action="" method="post">
		<table class="tab_one" style="text-align:center;">
			<tr>
				<th style="text-align:center;">SL</th>
				<th style="text-align:center;">Name</th>
				<th style="text-align:center;">ID</th>
				<th style="text-align:center;">Attendance</th>
				<th style="text-align:center;">Delete student</th>
				
			</tr>
			<p style="text-align:center;color:#34495e;">
    <mark>Select department: 
        <select name="dept" required>
            <option value="">Select Department</option>
            <?php
            require_once 'php/config.php';
            
            $query = "SELECT dept FROM att_dept";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['dept'] . "'>" . $row['dept'] . "</option>";
            }
            ?>
        </select>
    </mark>
</p>
<p style="text-align:center;color:#34495e;">
    <mark>Select subject: 
        <select name="subt" required>
        <?php
        require_once 'php/config.php';
        
        $query = "SELECT subject FROM att_subject";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row['subject'] . "'>" . $row['subject'] . "</option>";
        }
        ?>
        </select>
    </mark>
</p>
<p style="text-align:center;color:#34495e;">
    <mark>Select Semester: 
        <select name="semester" required>
        <?php
        require_once 'php/config.php';
        
        $query = "SELECT semester FROM att_semester";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row['semester'] . "'>" . $row['semester'] . "</option>";
        }
        ?>
        </select>
    </mark>
</p>
<p style="text-align:center;color:#34495e;">
    <mark>Select date: <input type="date" name="attndate" required/></mark>
</p>
<p style="text-align:center;color:#34495e;">
    <mark>Select time: <input type="time" name="attntime" required/></mark>
</p>

			<?php 
			$i=0;
				$alluser = $user->attn_student();
				
				while($rows = $alluser->fetch_assoc()){
				$i++;
		?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $rows['name'];?></td>
				<td><?php echo $rows['st_id'];?></td>
				<td>
					<label style="font-size:20px;background-color: red;color: #fff;padding: 4px;border-radius: 5px;"><input type="radio" name="attn[<?php echo $rows['st_id'];?>]" value="absent" checked/>Absent</label>
					
					<label style="font-size:20px;    background-color: green;color: #fff;padding: 4px;border-radius: 5px;"> <input type="radio" name="attn[<?php echo $rows['st_id'];?>]" value="present" />Present</label>
				</td>
				<td><a href="att_del.php?dl=<?php echo $rows['id']; ?>">Delete</a></td>
			</tr>
			<?php } ?>
	
		</table>
		<center>
		<span><input style="<text-align:right></text-align:right>;background:#58A85D;border:none;color:#fff;padding:8px 100px;" type="submit" name="submit" value="Submit" /></span> <br>
		</center>
		
	
	</form>
		

		
</div>
<?php include "php/footerbottom.php";?>
<?php ob_end_flush() ; ?>