<?php
session_start();
require "php/config.php";
require_once "php/functions.php";
$user = new login_registration_class();
$sid = $_SESSION['sid'];
$sname = $_SESSION['sname'];
if (!$user->getsession()) {
    header('Location: st_login.php');
    exit();
}
?>
<?php
$pageTitle = "Student Attendance";
include "php/headertop.php";
?>
<div class="attendance">
    <h3 style="text-align: center;color: #fff;margin: 0;padding: 5px;background: #1abc9c">View Attendance</h3>
    <table class="tab_one">
        <tr>
            <th style="text-align: center;">Date</th>
            <th style="text-align: center;">Status</th>
        </tr>
        <?php
        $attendance_details = $user->attn_all_student_by_id($sid); // Add this function to functions.php

        while ($attendance_row = $attendance_details->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $attendance_row['at_date']; ?></td>
                <td><?php echo $attendance_row['atten']; ?></td>
            </tr>
        <?php } ?>

    </table>
</div>

<?php include "php/footerbottom.php"; ?>
<?php ob_end_flush(); ?>
