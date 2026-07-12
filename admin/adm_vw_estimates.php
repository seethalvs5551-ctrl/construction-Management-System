<?php
include "admin_header.php";
$qry = "SELECT * FROM `estimate` ORDER BY(`date`)DESC";
$res = mysqli_query($con,$qry);
?>
    <!-- inner banner -->
    <section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-5 pb-sm-4 pb-2">
                <h4 class="inner-text-title font-weight-bold pt-5">Estimate</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="../index.html">Admin</a></li>
                    <li class="active"><i class="fas fa-angle-right mx-2"></i>Estimate</li>
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
                    <h3 class="title-style">Estimate</h3>  
                    <!-- <h5 class="sub-title">Here</h5> -->
                </div>
                <div class="row d-flex justify-content-center align-items-center w-100">
                    <div class="col-md-10 contacts12-main">
                    <table class="table table-stripd table-primary text-center">
                        <tr>
                            <th>User name</th>
                            <th>Date</th>
                            <th>Location</th>
                            <th>Sqft</th>
                            <th>Bedrooms</th>
                            <th>Bathrooms</th>
                            <th>Floors</th>
                            <th>Description</th>
                            <th>More</th>
                        </tr>
                        <?php
                            while($row = mysqli_fetch_array($res))
                            {
                                $cmp_id = $row['uid'];
                                $qry_for_status = "SELECT * FROM `user_reg` WHERE `u_id` = $cmp_id";
                                $status_res = mysqli_query($con,$qry_for_status);
                                $status = mysqli_fetch_array($status_res);
                                if ($row['file'] == Null)
                                {


                        ?>
                                <tr>
                                    <td><?php echo $status['name'] ?></td>
                                    <td><?php echo $row['date'] ?></td>
                                    <td><?php echo $row['location'] ?></td>
                                    <td><?php echo $row['sqft'] ?></td>
                                    <td><?php echo $row['bedroom'] ?></td>
                                    <td><?php echo $row['bathroom'] ?></td>
                                    <td><?php echo $row['floors'] ?></td>
                                    <td><?php echo $row['description'] ?></td>
                                    <td>
                                        <a href="adm_add_estimate.php?eid=<?php echo $row['eid'] ?>"><button class="btn btn-info">More</button></a>
                                    </td>
                                </tr>
                        <?php
                                }
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

