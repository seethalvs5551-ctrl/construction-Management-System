<?php
include "commonheader.php";
?>
    <!-- inner banner -->
    <section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-5 pb-sm-4 pb-2">
                <h4 class="inner-text-title font-weight-bold pt-5">Delivery boy registration</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="../index.html">Home</a></li>
                    <li class="active"><i class="fas fa-angle-right mx-2"></i>Delivery boy registration</li>
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
                <h5 class="sub-title">Add</h5>
                    <h3 class="title-style">Your details</h3>
                    <h5 class="sub-title">Here</h5>
                </div>
                <div class="row d-flex justify-content-center align-items-center w-100">
                    <div class="col-md-6 contacts12-main">
                        <form method="post" class="main-input" enctype="multipart/form-data">
                        <div class="row top-inputs">
                            <div class="col-md-12">
                                <input type="text" placeholder="Name" name="p_name" id="w3lName" required="">
                            </div>
                            <div class="col-md-12">
                            <input type="text" min="0" placeholder="Phone" name="p_phon" id="w3lName" required="" pattern="[6789][0-9]{9}" maxlength="10">
                            </div>
                            <div class="col-md-12">
                                <input type="email" placeholder="Email" name="email" id="w3lName" required="">
                            </div>
                            <div class="col-md-12">
                                <input type="text" placeholder="Password" name="pwrd" id="w3lName" required="" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$" title="Must contain at least one number, one uppercase and lowercase letter, and at least 8 or more characters">
                            </div>
                        <div>
                        <textarea type="text" name="address" placeholder="Address" id="w3lSender" required=""></textarea>
                    </div>
                    <div class="text-end ">
                        <button type="submit" name="SUBMIT" class="btn btn-style w-100">Add</button>
                    </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </section>

    
    <!-- theme switch js (light and dark)-->
    <script src="assets/js/theme-change.js"></script>
    <!-- //theme switch js (light and dark)-->

</body>
<?php
if(isset($_POST['SUBMIT']))
{
     $p_name=$_POST['p_name'];
     $p_phon=$_POST['p_phon'];
     $email=$_POST['email'];
     $pwrd=$_POST['pwrd'];
     $address=$_POST['address'];

     $qryCheck = "SELECT * FROM `login` WHERE `uname` ='$email'";
     $resCheck = mysqli_query($con,$qryCheck);
     $count = mysqli_num_rows($resCheck);
     if($count > 0)
     {
         echo "<script>alert('Email taken')</script>";
     }
     else
     {
         $qry="INSERT INTO `dboy`(`name`,`phone`,`address`) VALUE ('$p_name','$p_phon','$address')";
         $res = mysqli_query($con,$qry);
         $qrylogin="INSERT INTO `login`(`uid`,`uname`,`password`,`utype`,`status`) VALUE((SELECT MAX(`did`) FROM `dboy`),'$email','$pwrd','dboy','Approved')";
         $res2 = mysqli_query($con,$qrylogin);
        if($res && $res2){
            echo "<script>alert('Registered successfully')</script>";
        }else{
            echo "<script>alert('Error Occured')</script>"; 
        }
    }
     echo "<script>location.href = 'delivryb_reg.php'</script>";

}
    include "./commonfooter.php";
?>
</html>

