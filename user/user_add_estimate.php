<?php
include "user_header.php";
$qry = "SELECT * FROM `estimate` WHERE `uid` = $uid";
$res = mysqli_query($con,$qry);
?>

<!-- inner banner -->
    <section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-5 pb-sm-4 pb-2">
                <h4 class="inner-text-title font-weight-bold pt-5">Request estimate</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="user_home.php">User</a></li>
                    <li class="active"><i class="fas fa-angle-right mx-2"></i>Estimate</li>
                    <!-- <li class="active"><i class="fas fa-angle-right mx-2"></i>Add quantity</li> -->
                </ul>
            </div>
        </div>
    </section>
<!-- //inner banner -->

    <section class="w3l-w3l-contacts-12 py-5">
        <div class="contact-top py-lg-5 py-md-4 py-2">
            <div class="container">
                <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:500px;">
                <h5 class="sub-title">Add</h5>
                    <h3 class="title-style">Construction details</h3>
                    <h5 class="sub-title">Here</h5>
                </div>
                <div class="row d-flex justify-content-center align-items-center w-100">
                    <div class="col-md-6 contacts12-main">
                        <form method="post" class="main-input" enctype="multipart/form-data">
                        <div class="row top-inputs">
                            <div>
                                <input type="text" placeholder="Location" name="loc" id="w3lName" required="">
                            </div>
                            <div>
                                <input type="number" placeholder="Square feet" name="sqft" id="w3lName" required="">
                            </div>
                            <div>
                                <input type="number" placeholder="No of bedrooms" name="bd" id="w3lName" required="">
                            </div>
                            <div>
                                <input type="number" placeholder="No of bathrooms" name="bath" id="w3lName" required="">
                            </div>
                            <div>
                                <input type="number" placeholder="No of floors" name="floor" id="w3lName" required="">
                            </div>
                            <div>
                                <textarea name="desc" id="" placeholder="Description" required></textarea>
                            </div>
                            <div class="text-end">
                                <button type="submit" name="SUBMIT" class="btn btn-style w-100">Add</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:500px;">
                <h5 class="sub-title">View</h5>
                    <h3 class="title-style">Estimate requests</h3>  
                    <!-- <h5 class="sub-title">Here</h5> -->
                </div>
                <div class="row d-flex justify-content-center align-items-center w-100">
                    <div class="col-md-10 contacts12-main">
                    <table class="table table-stripd table-primary text-center">
                        <t       r>
                            <th>Date</th>
                            <th>Location</th>
                            <th>Sqft</th>
                            <th>Bedrooms</th>
                            <th>Bathrooms</th>
                            <th>Floors</th>
                            <th>Description</th>
                            <th>Estimate</th>
                        </tr>
                        <?php
                            while($row = mysqli_fetch_array($res))
                            {
                        ?>
                                <tr>
                                    <td><?php echo $row['date'] ?></td>
                                    <td><?php echo $row['location'] ?></td>
                                    <td><?php echo $row['sqft'] ?></td>
                                    <td><?php echo $row['bedroom'] ?></td>
                                    <td><?php echo $row['bathroom'] ?></td>
                                    <td><?php echo $row['floors'] ?></td>
                                    <td><?php echo $row['description'] ?></td>
                                    <?php
                                        if ($row['file'])
                                        {
                                    ?>
                                            <td><a href="<?php echo $row['file'] ?>" target="_blank">🔽</a></td>
                                    <?php
                                        }
                                        else{
                                            echo "<td></td>";
                                        }
                                    ?>
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
if(isset($_POST['SUBMIT']))
{
    $loc=$_POST['loc'];
    $sqft=$_POST['sqft'];
    $bd=$_POST['bd'];
    $bath=$_POST['bath'];
    $floor=$_POST['floor'];
    $desc=$_POST['desc'];
    $qry="INSERT INTO `estimate`(`uid`, `location`, `sqft`, `bedroom`, `bathroom`, `floors`, `description`) VALUES ('$uid','$loc','$sqft','$bd','$bath','$floor','$desc')";
    $res = mysqli_query($con,$qry);
    echo $qry;
    if($res){
        echo "<script>alert('Requested');location.href = 'user_add_estimate.php'</script>";
    }else{
        echo "<script>alert('Error Occured')</script>";
    }
}
    include "../commonfooter.php";
?>
</html>