<?php
include "user_header.php";
$qry = "SELECT * FROM `book_request` WHERE `u_id` = $uid AND `status` = 'Paid' ORDER BY (`br_id`) DESC";
$res = mysqli_query($con,$qry);
?>
    <!-- inner banner -->
    <section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-5 pb-sm-4 pb-2">
                <h4 class="inner-text-title font-weight-bold pt-5">History</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="user_home.php">Users</a></li>
                    <li class="active"><i class="fas fa-angle-right mx-2"></i>History</li>
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
                    <h3 class="title-style">History</h3>
                    <!-- <h5 class="sub-title">Here</h5> -->
                </div>
                <div class="row d-flex justify-content-center align-items-center w-100">
                    <div class="col-md-10 contacts12-main">
                    <table class="table table-stripd table-primary text-center">
                        <tr>
                            <th>Labour name</th>
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
                                $cmp_id = $row['l_id'];
                                $qry_for_status = "SELECT * FROM `labour_reg` WHERE `l_id` = '$cmp_id'";
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
                                    <td>
                                        <a href="user_bill.php?rid=<?php echo $row['br_id'] ?>&amount=<?php echo $row['amount'] ?>"><button class="btn btn-primary">Bill</button></a>
                                    </td>
                                    <td>
                                        <a href="user_add_rating.php?rid=<?php echo $labour['l_id'] ?>&reqid=$row['br_id']"><button class="btn btn-warning">Add rating</button></a>
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

