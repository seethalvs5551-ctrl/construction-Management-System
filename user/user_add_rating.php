<?php
include "user_header.php";
$p_id = $_GET['rid'];
$qry = "SELECT * FROM labour_reg WHERE l_id = $p_id";
$res = mysqli_query($con,$qry);
$row = mysqli_fetch_array($res)
?>
    <!-- inner banner -->
    <section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-5 pb-sm-4 pb-2">
                <h4 class="inner-text-title font-weight-bold pt-5">Add your ratings</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="user_home.php">User</a></li>
                    <li class="active"><i class="fas fa-angle-right mx-2"></i>History</li>
                    <li class="active"><i class="fas fa-angle-right mx-2"></i>Add rating</li>
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
                    <h3 class="title-style">your rating out of 5</h3>
                    <h5 class="sub-title">Here</h5>
                </div>
                <div class="row d-flex justify-content-center align-items-center w-100">
                    <div class="col-md-6 contacts12-main">
                        <form method="post" class="main-input" enctype="multipart/form-data">
                        <div class="row top-inputs">
                            <div>
                                <input type="number" placeholder="Rating" name="p_qty" id="w3lName" required="" min="1" max="5">
                            </div>
                            <div class="text-end">
                                <button type="submit" name="SUBMIT" class="btn btn-style w-100">Add</button>
                            </div>
                        </div>
                        </form>
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
    $p_qty=$_POST['p_qty'];
    $newrating = $row['rating'] + $p_qty;
    $newoutof = $row['outof'] + 5;
    $qry="UPDATE labour_reg SET rating = '$newrating',outof = '$newoutof' WHERE l_id = '$p_id'";
    $res = mysqli_query($con,$qry);
    if($res){
        echo "<script>alert('Rating added')</script>";
        echo "<script>location.href = 'user_vw_history.php'</script>";
    }else{
        echo "<script>alert('Error Occured')</script>";
    }
}
    include "../commonfooter.php";
?>
</html>