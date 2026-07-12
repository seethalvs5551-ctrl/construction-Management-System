<?php
include "admin_header.php";
$qry = "SELECT * FROM `labour_reg` ORDER BY(`l_id`)DESC";
$res = mysqli_query($con,$qry);
?>
    <!-- inner banner -->
    <section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-5 pb-sm-4 pb-2">
                <h4 class="inner-text-title font-weight-bold pt-5">Labours</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="../index.html">Admin</a></li>
                    <li class="active"><i class="fas fa-angle-right mx-2"></i>Labours</li>
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
                    <h3 class="title-style">Labours</h3>  
                    <!-- <h5 class="sub-title">Here</h5> -->
                </div>
                <div class="row d-flex justify-content-center align-items-center w-100">
                    <div class="col-md-10 contacts12-main">
                    <table class="table table-stripd table-primary text-center">
                        <tr>
                            <th>Labour name</th>
                            <th>E-mail</th>
                            <th>Place</th>
                            <th>Phone</th>
                            <th>Work type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php
                            while($row = mysqli_fetch_array($res))
                            {
                                $cmp_id = $row['l_id'];
                                $qry_for_status = "SELECT * FROM `login` WHERE `uid` = $cmp_id AND `utype` = 'labours'";
                                $status_res = mysqli_query($con,$qry_for_status);
                                $status = mysqli_fetch_array($status_res)

                        ?>
                                <tr>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['place'] ?></td>
                                    <td><?php echo $row['phonenumber'] ?></td>
                                    <td><?php echo $row['purpose'] ?></td>
                                    <td><?php echo $status['status'] ?></td>
                                    <td><?php
                                            if ($status['status'] == 'Approved')
                                            {
                                            ?>
                                                <a href="adm_actions.php?action=block_labour&log_id=<?php echo $status['lid'] ?>&targ=adm_vw_labours.php"><button class="btn btn-danger">Block</button></a>
                                            <?php
                                            }
                                            elseif ($status['status'] == 'Pending')
                                            {
                                        ?>
                                                <a href="adm_actions.php?action=approv_labour&log_id=<?php echo $status['lid'] ?>&targ=adm_vw_labours.php"><button class="btn btn-success">Approve</button></a>
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

