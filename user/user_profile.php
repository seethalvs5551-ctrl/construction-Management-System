<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<?php
include "user_header.php";
$qry = "SELECT * FROM `user_reg` WHERE `u_id` = $uid";
$res = mysqli_query($con,$qry);
$row = mysqli_fetch_array($res);
?>
    <!-- //header -->

    <!-- inner banner -->
    <section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-5 pb-sm-4 pb-2">
                <h4 class="inner-text-title font-weight-bold pt-5">Profile</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="index.html">User</a></li>
                    <li class="active"><i class="fas fa-angle-right mx-2"></i>User</li>
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
                    <h5 class="sub-title">Add your</h5>
                    <h3 class="title-style">Details</h3>
                    <h5 class="sub-title">Here</h5>
                </div>
                <div class="row d-flex justify-content-center align-items-center w-100">
                    <div class="col-md-6 contacts12-main ">
                        <form  method="post" class="main-input">
                            <div class="row top-inputs">
                                <div class="col-md-12">
                                    <input type="text"  placeholder="Name" name="name" id="w3lName" required="" value="<?php echo $row['name'] ?>">
                                </div>
                                <div class="col-md-12">
                                    <input type="number" name="age" placeholder="Age" id="w3lSender" required="" value="<?php echo $row['age'] ?>">
                                </div>
                                <div class="col-md-12">
                                    <input type="email" name="email" placeholder="Email" id="w3lSender" required="" value="<?php echo $row['email'] ?>" disabled>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" name="place" placeholder="place" id="w3lSender" required="" value="<?php echo $row['place'] ?>">
                                </div>
                                <div class="col-md-12">
                                    <input type="number" name="phonenumber" placeholder="phonenumber" id="w3lSender" required="" value="<?php echo $row['phonenumber'] ?>">
                                </div>
                                <div class="col-md-12">
                                    <input type="password" name="password" placeholder="password" id="w3lSender" required="" value="<?php echo $row['password'] ?>" disabled>
                                </div>
                                <div class="col-md-5">
                                    <label for="purpose">Selected purpose :</label>
                                    <input disabled  value="<?php echo $row['purpose'] ?>" id="w3lSender" >
                                </div>
                                <div class="col-md-7">
                                <label for="purpose">Change purpose :</label>
                                <select id="purpose" name="purpose" value="">
                                        <option value="" selected disabled>Choose one</option>
                                        <option value="New home construction">Newhome construction</option>
                                        <option value="Maintance">Maintance</option>
                                        <option value="Shifting">Shifting</option>
                                
                                        <option value="Mechanical workers">Mechanical workers</option>
                                 
                                        <option value="Labours">Labours</option>
                                    </select>
                                    <br><br>
                                </div>

                                
                            </div>
                           
                            <!-- <input type="submit" name="SUBMIT" value="SUBMIT">
                            <div class="text-end"> -->
                                <button type="submit" name="SUBMIT" class="btn btn-style w-100">Register</button>
                            </div>
                        </form>
                    </div>
                    <!-- <div class="col-md-4 ps-lg-5 mt-md-0 mt-4">
                        <h3 class="title-style mb-4">Contact Info</h3>
                        <div class="contact">
                            <a href="mailto:hello@example.com">
                                <p class="contact-text-sub">hello@example.com</p>
                            </a>
                            <a href="tel:+7-800-999-800">
                                <p class="contact-text-sub">+7-800-999-800</p>
                            </a>
                            <p class="contact-text-sub">76 West Rock, Maple Building, <br>London.</p>
                            <div class="buttons-teams">
                                <a href="#team"><span class="fab fa-facebook-square" aria-hidden="true"></span></a>
                                <a href="#team"><span class="fab fa-twitter-square" aria-hidden="true"></span></a>
                                <a href="#team"><span class="fab fa-google-plus-square" aria-hidden="true"></span></a>
                            </div>
                        </div>
                    </div> -->
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
    $name=$_POST['name'];
    $age=$_POST['age'];
    $place=$_POST['place'];
    $phonenumber=$_POST['phonenumber'];
    if(isset($_POST['purpose'])){
        $purpose=$_POST['purpose'];
        $qry="UPDATE `user_reg` SET `name`= '$name',`age`= '$age',`place`='$place',`phonenumber`='$phonenumber',`purpose`='$purpose' WHERE `u_id` = $uid";
    }else{
        $qry="UPDATE `user_reg` SET `name`= '$name',`age`= '$age',`place`='$place',`phonenumber`='$phonenumber' WHERE `u_id` = $uid";
    }
    $res = mysqli_query($con,$qry);
    if($res){
        echo "<script>alert('Updated successful')</script>";
        echo "<script>location='user_profile.php'</script>";
    }else{
        echo "<script>alert('Error Occured')</script>"; 
    }

}
include "../commonfooter.php";
?>
</html>
