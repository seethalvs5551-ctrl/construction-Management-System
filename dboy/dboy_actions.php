<?php
session_start();
include "../connection.php";
$action = $_GET['action'];
if ($action == 'deliverd')
{
    $brid = $_GET['brid'];
    $qry = "UPDATE `prod_book_rq` SET `status`= 'Delivered' WHERE `pbr_id`='$brid'";
    $apprUser = mysqli_query($con, $qry);
    echo '<script>alert("Status updated successfully")</script>';
    echo "<script>location.href = 'dboy_vw_orders.php'</script>";
}