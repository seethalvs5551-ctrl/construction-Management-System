<?php
session_start();
include "../connection.php";
$action = $_GET['action'];
if ($action == 'reject_req')
{
    $rid = $_GET['rid'];
    $targ = $_GET['targ'];
    $qry = "DELETE FROM `book_request` WHERE `br_id` = '$rid'";
    $apprUser = mysqli_query($con, $qry);
    echo '<script>alert("Removed")</script>';
    echo "<script>location.href = '$targ'</script>";
}
else if ($action == 'approve_req')
{
    $rid = $_GET['rid'];
    $targ = $_GET['targ'];
    $qry = "UPDATE `book_request` SET `status`='Approved' WHERE `br_id`='$rid'";
    $apprUser = mysqli_query($con, $qry);
    echo '<script>alert("Approved")</script>';
    echo "<script>location.href = '$targ'</script>";
}
else if ($action == 'mark_completed')
{
    $amount = $_POST['amt'];
    $rid = $_GET['rid'];
    $targ = $_GET['targ'];
    $qry = "UPDATE `book_request` SET `status`='Not Paid', `amount`= $amount WHERE `br_id`='$rid'";
    $apprUser = mysqli_query($con, $qry);
    echo '<script>alert("Marked as completed")</script>';
    echo "<script>location.href = '$targ'</script>";

}
