<?php
include "user_header.php";
$uid = $_SESSION['uid'];
$qry = "SELECT * FROM `prod_book_rq` WHERE `u_id` = $uid ORDER BY (`pbr_id`) DESC";
$res = mysqli_query($con,$qry);
?>
    <!-- inner banner -->
    <section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-5 pb-sm-4 pb-2">
                <h4 class="inner-text-title font-weight-bold pt-5">Orders</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="user_home.php">Users</a></li>
                    <li class="active"><i class="fas fa-angle-right mx-2"></i>Orders</li>
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
                    <h3 class="title-style">Orders</h3>  
                    <!-- <h5 class="sub-title">Here</h5> -->
                </div>
                <div class="row d-flex justify-content-center align-items-center w-100">
                    <div class="col-md-10 contacts12-main">
                    <table class="table table-stripd table-primary text-center">
                        <tr>
                            <th>Product name</th>
                            <th>Qty</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th colspan="2">Status</th>
                        </tr>
                        <?php
                            while($row = mysqli_fetch_array($res))
                            {
                                $cmp_id = $row['p_id'];
                                $qry_for_status = "SELECT * FROM `products` WHERE `p_id` = '$cmp_id'";
                                $status_res = mysqli_query($con,$qry_for_status);
                                $labour = mysqli_fetch_array($status_res);
                        ?>
                                <tr>
                                    <td><?php echo $labour['p_name'] ?></td>
                                    <td><?php echo $row['qty'] ?></td>
                                    <td><?php echo $row['amount'] ?></td>
                                    <td><?php echo $row['date'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
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

 