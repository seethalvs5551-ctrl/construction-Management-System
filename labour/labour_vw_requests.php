<?php
session_start();
include "labour_header.php";
include "../connection.php";
$uid = $_SESSION['uid'];
$qry = "SELECT * FROM `book_request` WHERE `l_id` = $uid AND `status` != 'Paid' ORDER BY (`br_id`) DESC";
$res = mysqli_query($con,$qry);
?>
    <!-- inner banner -->
    <section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-5 pb-sm-4 pb-2">
                <h4 class="inner-text-title font-weight-bold pt-5">Requests</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="labour_home.php">Labours</a></li>
                    <li class="active"><i class="fas fa-angle-right mx-2"></i>Requests</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- //inner banner -->

        <!-- contact -->
        <section class="w3l-w3l-contacts-12 py-5">
        <div class="contact-top py-lg-5 py-md-4 py-2">
            <div class="container">
                <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:500px;">
                <h5 class="sub-title">View</h5>
                    <h3 class="title-style">Requests</h3>  
                    <!-- <h5 class="sub-title">Here</h5> -->
                </div>
                <div class="row d-flex justify-content-center align-items-center w-100">
                    <div class="col-md-12 contacts12-main">
                    <table class="table table-stripd table-primary text-center">
                        <tr>
                            <th>User name</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Description</th>
                            <th>Requested on</th>
                            <th>Status</th>
                            <th colspan="2">Action</th>
                        </tr>
                        <?php
                            while($row = mysqli_fetch_array($res))
                            {
                                $cmp_id = $row['u_id'];
                                $qry_for_status = "SELECT * FROM `user_reg` WHERE `u_id` = '$cmp_id'";
                                $status_res = mysqli_query($con,$qry_for_status);
                                $labour = mysqli_fetch_array($status_res);
                        ?>
                                <tr>
                                    <td><?php echo $labour['name'] ?></td>
                                    <td><?php echo $row['from'] ?></td>
                                    <td><?php echo $row['to'] ?></td>
                                    <td><?php echo $row['description'] ?></td>
                                    <td><?php echo $row['date'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                    <td><?php
                                            if ($row['status'] == 'Pending')
                                            {
                                        ?>
                                                <a href="labour_action.php?rid=<?php echo $row['br_id'] ?>&action=approve_req&targ=labour_vw_requests.php"><button class="btn btn-success">Approve</button></a>
                                                <a href="labour_action.php?rid=<?php echo $row['br_id'] ?>&action=reject_req&targ=labour_vw_requests.php"><button class="btn btn-danger">Reject</button></a>
                                        <?php
                                            }
                                            else if($row['status'] == 'Approved'){
                                        ?>
                                                <form action="labour_action.php?action=mark_completed&rid=<?php echo $row['br_id'] ?>&targ=labour_vw_requests.php" method="post" class="main-input">
                                                    <input type="number" name="amt" id="" required placeholder="Add amount" class="w-50">
                                                    <button type="submit" class="btn btn-warning">Completed</button>
                                                </form>
                                        <?php
                                            }
                                            else if($row['status'] == 'Not Paid')
                                            {
                                        ?>
                                            <td>Rs.<?php echo $row['amount'] ?></td>

                                        <?php
                                            }
                                        ?>
                                    </td>
                                </tr>
                        <?php
                            }
                        ?>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <!-- theme switch js (light and dark)-->
    <script src="../assets/js/theme-change.js"></script>
    <!-- //theme switch js (light and dark)-->

</body>
<?php
    include "../commonfooter.php";
?>
</html>

