<?php
session_start();
require "php/config.php";
require_once "php/functions.php";
$user = new login_registration_class();
$admin_id = $_SESSION['admin_id'];
$admin_name = $_SESSION['admin_name'];
if (!$user->get_admin_session()) {
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
    <div class="fix" style="background:#ddd;padding:20px;">
        <span style="float:left;">
            <button style="background:#58A85D;border:none;color:#fff;padding:10px;">
                <a style="color:#fff;" href="att_add.php">Add student</a>
            </button>
        </span>
        <span style="float:right;">
            <button style="background:#58A85D;border:none;color:#fff;padding:10px;">
                <a style="color:#fff;" href="class_att.php">Take Attendance</a>
            </button>
        </span>
    </div>

    <table class="tab_one" style="text-align:center;">
        <tr>
            <th style="text-align:center;">SL</th>
            <th style="text-align:center;">Attendance Date</th>
            <th style="text-align:center;">Time</th>
            <th style="text-align:center;">Department</th>
            <th style="text-align:center;">Subject</th>
            <th style="text-align:center;">Semester</th>
            <th style="text-align:center;">Action</th>
        </tr>
        <?php 
        $i = 0;
        $get_attendance_dates = $user->get_attn_date();
        
        while ($date_row = $get_attendance_dates->fetch_assoc()) {
            $i++;
            $attendance_details = $user->attn_all_student($date_row['at_date']);
        ?>
            <tr>
                <td rowspan="<?php echo mysqli_num_rows($attendance_details); ?>"><?php echo $i;?></td>
                <td rowspan="<?php echo mysqli_num_rows($attendance_details); ?>"><?php echo date('D-M-Y', strtotime($date_row['at_date'])); ?></td>

                <?php
                $first_row = true;
                while ($attendance_row = $attendance_details->fetch_assoc()) {
                    if (!$first_row) {
                        echo '<tr>';
                    }
                ?>
                    <td><?php echo $attendance_row['at_time'];?></td>
                    <td><?php echo $attendance_row['dept'];?></td>
                    <td><?php echo $attendance_row['subt'];?></td>
                    <td><?php echo $attendance_row['semester'];?></td>
                    <?php
                    if ($first_row) {
                        echo '<td rowspan="' . mysqli_num_rows($attendance_details) . '"><a href="att_single_view.php?dt=' . $date_row['at_date'] . '">View Attendance</a></td>';
                    }
                    ?>
                </tr>
                <?php
                $first_row = false;
                }
                ?>
        <?php } ?>
    </table>
</div>
<?php include "php/footerbottom.php";?>
<?php ob_end_flush(); ?>
