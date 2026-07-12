<?php
include "user_header.php";
$qry = "SELECT * FROM labour_reg ORDER BY(l_id)DESC";
$res = mysqli_query($con,$qry);
?>
    <!-- inner banner -->
    <section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-5 pb-sm-4 pb-2">
                <h4 class="inner-text-title font-weight-bold pt-5">Labours</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="user_home.php">Users</a></li>
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
                            <th>Rating</th>
                            <th>Book</th>
                        </tr>
                        <?php
                            while($row = mysqli_fetch_array($res))
                            {
                                $cmp_id = $row['l_id'];
                                $qry_for_status = "SELECT * FROM login WHERE uid = $cmp_id AND utype = 'labours' AND status = 'Approved'";
                                $status_res = mysqli_query($con,$qry_for_status);
                                $status = mysqli_fetch_array($status_res);
                                if ($status != NULL)
                                {

                        ?>
                                <tr>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['place'] ?></td>
                                    <td><?php echo $row['phonenumber'] ?></td>
                                    <td><?php echo $row['purpose'] ?></td>
                                    <td><?php 
                                    if($row['outof'] != 0) {
            echo ($row['rating'] / ($row['outof'] / 5)) ,"/",5;
        } else {
            echo "Not Rated";
        }
    ?>
</td>

                                    <td>
                                        <a href="user_book_page.php?lid=<?php echo $row['l_id'] ?>"><button class="btn btn-info">Book</button></a>
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