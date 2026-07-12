<?php
session_start();
include "../connection.php";
$action = $_GET['action'];
if ($action == 'block_user' or $action == 'approv_user')
{
    $lid = $_GET['log_id'];
    $targ = $_GET['targ'];
    if ($action == 'block_user'){
        $qry = "UPDATE `login` SET `status`='Pending' WHERE `lid`='$lid'";
        $apprUser = mysqli_query($con, $qry);
        echo '<script>alert("Blocked")</script>';
    }
    else if ($action == 'approv_user'){
        $qry = "UPDATE `login` SET `status`='Approved' WHERE `lid`='$lid'";
        $apprUser = mysqli_query($con, $qry);
        echo '<script>alert("Approved")</script>';
    }
    echo "<script>location.href = '$targ'</script>";
}
else if ($action == 'block_labour' or $action == 'approv_labour')
{
    $lid = $_GET['log_id'];
    $targ = $_GET['targ'];
    if ($action == 'block_labour'){
        $qry = "UPDATE `login` SET `status`='Pending' WHERE `lid`='$lid'";
        $apprUser = mysqli_query($con, $qry);
        echo '<script>alert("Blocked")</script>';
    }
    else if ($action == 'approv_labour'){
        $qry = "UPDATE `login` SET `status`='Approved' WHERE `lid`='$lid'";
        $apprUser = mysqli_query($con, $qry);
        echo '<script>alert("Approved")</script>';
    }
    echo "<script>location.href = '$targ'</script>";
}
else if ($action == 'block_dboy' or $action == 'approv_dboy')
{
    $lid = $_GET['log_id'];
    $targ = $_GET['targ'];
    if ($action == 'block_dboy'){
        $qry = "UPDATE `login` SET `status`='Pending' WHERE `lid`='$lid'";
        $apprUser = mysqli_query($con, $qry);
        echo '<script>alert("Blocked")</script>';
    }
    else if ($action == 'approv_dboy'){
        $qry = "UPDATE `login` SET `status`='Approved' WHERE `lid`='$lid'";
        $apprUser = mysqli_query($con, $qry);
        echo '<script>alert("Approved")</script>';
    }
    echo "<script>location.href = '$targ'</script>";
}
else if ($action == 'remove_feed')
{
    $f_id = $_GET['f_id'];
    // echo "<script>alert('$f_id');</script>";
    $targ = $_GET['targ'];
    $qry = "DELETE FROM `feedback` WHERE `f_id` = $f_id";
    $apprUser = mysqli_query($con, $qry);
    echo '<script>alert("Feedback removed")</script>';
    echo "<script>location.href = '$targ'</script>";
}
else if ($action == 'del_prod')
{
    $p_id = $_GET['p_id'];
    $targ = $_GET['targ'];
    $qry = "DELETE FROM `products` WHERE `p_id` = $p_id";
    $apprUser = mysqli_query($con, $qry);
    echo '<script>alert("Product removed")</script>';
    echo "<script>location.href = '$targ'</script>";
}
else if ($action == 'deliverd')
{
    $brid = $_GET['brid'];
    $qry = "UPDATE `prod_book_rq` SET `status`= 'Delivered' WHERE `pbr_id`='$brid'";
    $apprUser = mysqli_query($con, $qry);
    echo '<script>alert("Status updated successfully")</script>';
    echo "<script>location.href = 'adm_vw_orders.php'</script>";
}