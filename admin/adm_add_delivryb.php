<?php
include "admin_header.php";
$qry = "SELECT * FROM `dboy` ORDER BY(`did`)DESC";
$res = mysqli_query($con,$qry);
?>
    <!-- inner banner -->
    <section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-5 pb-sm-4 pb-2">
                <h4 class="inner-text-title font-weight-bold pt-5">Deliveryboy</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="../index.html">Admin</a></li>
                    <li class="active"><i class="fas fa-angle-right mx-2"></i>Deliveryboy</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- //inner banner -->

    <section class="w3l-w3l-contacts-12 py-5">
        <div class="contact-top py-lg-5 py-md-4 py-2">
            <div class="container">

                <br><br>
                <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:500px;">
                <h5 class="sub-title">Manage</h5>
                    <h3 class="title-style">Delivery boy</h3>  
                    <!-- <h5 class="sub-title">Here</h5> -->
                </div>
                <div class="row d-flex justify-content-center align-items-center w-100">
                    <div class="col-md-10 contacts12-main">
                    <table class="table table-stripd table-primary text-center">
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                        <?php
                            while($row = mysqli_fetch_array($res))
                            {
                                $cmp_id = $row['did'];
                                $qry_for_status = "SELECT * FROM `login` WHERE `uid` = $cmp_id AND `utype` = 'dboy'";
                                $status_res = mysqli_query($con,$qry_for_status);
                                $status = mysqli_fetch_array($status_res)

                        ?>
                                <tr>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['phone'] ?></td>
                                    <td><?php echo $row['address'] ?></td>
                                    <td><?php
                                            if ($status['status'] == 'Approved')
                                            {
                                            ?>
                                                <a href="adm_actions.php?action=block_dboy&log_id=<?php echo $status['lid'] ?>&targ=adm_add_delivryb.php"><button class="btn btn-danger">Block</button></a>
                                            <?php
                                            }
                                            elseif ($status['status'] == 'Pending')
                                            {
                                        ?>
                                                <a href="adm_actions.php?action=approv_dboy&log_id=<?php echo $status['lid'] ?>&targ=adm_add_delivryb.php"><button class="btn btn-success">Approve</button></a>
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


