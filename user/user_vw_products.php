<?php
include "user_header.php";
$qry = "SELECT * FROM `products` WHERE `p_qty` > 0 ORDER BY(`p_id`)DESC";
$res = mysqli_query($con,$qry);
?>
    <!-- inner banner -->
    <section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-5 pb-sm-4 pb-2">
                <h4 class="inner-text-title font-weight-bold pt-5">Products</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="user_home.php">Users</a></li>
                    <li class="active"><i class="fas fa-angle-right mx-2"></i>Products</li>
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
                    <h3 class="title-style">Products</h3>  
                    <!-- <h5 class="sub-title">Here</h5> -->
                </div>
                <div class="row d-flex justify-content-center align-items-center w-100">
                    <div class="col-md-10 contacts12-main">
                    <table class="table table-stripd table-primary text-center">
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Image</th>
                            <th>Buy</th>
                        </tr>
                        <?php
                            while($row = mysqli_fetch_array($res))
                            {

                        ?>
                                <tr>
                                <td><?php echo $row['p_name'] ?></td>
                                    <td><?php echo $row['p_desc'] ?></td>
                                    <td><?php echo $row['p_price'] ?></td>
                                    <td><?php echo $row['p_qty'] ?></td>
                                    <td><img src="<?php echo $row['p_img']?>" alt="" style="width:100px"></td>
                                    <td>
                                        <a href="user_add_qty.php?p_id=<?php echo $row['p_id'] ?>"><button class="btn btn-warning">Buy</button></a>
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

