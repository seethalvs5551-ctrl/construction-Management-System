<?php
include "dboy_header.php";
include "../connection.php";
$qry = "SELECT * FROM `prod_book_rq` WHERE `status` = 'Paid' ORDER BY (`date`) DESC";
$res = mysqli_query($con,$qry);
?>
    <!-- inner banner -->
    <section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-5 pb-sm-4 pb-2">
                <h4 class="inner-text-title font-weight-bold pt-5">Delivery boy home</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="../index.html">Delivery boy</a></li>
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
                            <th>Customer name</th>
                            <th>Place</th>
                            <th>Contact</th>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php
                            while($row = mysqli_fetch_array($res))
                            {
                                $cmp_id = $row['p_id'];
                                $qry_for_status = "SELECT * FROM `products` WHERE `p_id` = '$cmp_id'";
                                $status_res = mysqli_query($con,$qry_for_status);
                                $labour = mysqli_fetch_array($status_res);
                                $cid = $row['u_id'];
                                $qry_for_user = "SELECT * FROM `user_reg` WHERE `u_id` = '$cid'";
                                $usern = mysqli_query($con,$qry_for_user);
                                $user = mysqli_fetch_array($usern);
                        ?>
                                <tr>
                                    <td><?php echo $user['name'] ?></td>
                                    <td><?php echo $user['place'] ?></td>
                                    <td><?php echo $user['phonenumber'] ?></td>
                                    <td><?php echo $labour['p_name'] ?></td>
                                    <td><?php echo $row['qty'] ?></td>
                                    <td><?php echo $row['amount'] ?></td>
                                    <td><?php echo $row['date'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                    <td>
                                        <?php
                                            if ($row['status'] == 'Paid')
                                            {
                                        ?>
                                                <a href="dboy_actions.php?action=deliverd&brid=<?php echo $row['pbr_id'] ?>&amount=<?php echo $row['amount'] ?>"><button class="btn btn-success">Delivered</button></a>
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

