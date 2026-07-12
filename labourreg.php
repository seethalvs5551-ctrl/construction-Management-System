
<?php

include "commonheader.php";
include "connection.php";
?>
    <!-- inner banner -->
    <section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-5 pb-sm-4 pb-2">
                <h4 class="inner-text-title font-weight-bold pt-5">Labour registration</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="index.html">Home</a></li>
                    <li class="active"><i class="fas fa-angle-right mx-2"></i>Labour</li>
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
                    <div class="col-md-6 contacts12-main">
                        <form  method="post" class="main-input">
                        <div class="row top-inputs">
                            <div class="col-md-3">
                                <input disabled  value="Category :" id="w3lSender" >
                            </div>
                            <div class="col-md-9">
                                <select id="find_us" name="cate" required>
                                    <option selected disabled>Choose a category</option>
                                    <option value="Cleaning">Cleaning</option>
                                    <option value="Carpender">Carpender</option>
                                    <option value="Painting">Painting</option>
                                    <option value="Electrician">Electrician</option>
                                    <option value="Tile">Tile</option>
                                    <option value="Plumbing">Plumbing</option>
                                    <option value="Wiring">Wiring</option>
                                </select><br>
                            </div>
                                    <div class="col-md-12"> 
                                        <input type="text" placeholder="Name" name="name" id="w3lName" required="">
                                    </div>
                                    <div class="col-md-12">
                                        <input type="email" name="email" placeholder="Email" id="w3lSender" required="">
                                    </div>
                            
                                <div>
                                        <input type="text" placeholder="Phone Number" name="phonenumber" id="w3lName" required="" pattern="[6789][0-9]{9}" maxlength="10">
                                </div>
                                <div class="col-md-12">
                                        <input type="place" name="place" placeholder="place" id="w3lSender" required="">
                                    </div>
                                    <div>
                                        <input type="password" placeholder="password" name="password" id="w3lName" required=""  pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$" title="Must contain at least one number, one uppercase and lowercase letter, and at least 8 or more characters">
                                </div>
                                <!-- <input type="submit" name="SUBMIT" value="SUBMIT"> -->
                                <div class="text-end ">
                                    <button type="submit" name="SUBMIT" class="btn btn-style w-100">Register</button>
                                </div>
                            </div>
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
                            <p class="contact-text-sub">76 West Rock, Maple Building, <br>delhi</p>
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
   
</body>
<?php
if(isset($_POST['SUBMIT']))
{
     $name=$_POST['name'];
     $email=$_POST['email'];
     $phonenumber=$_POST['phonenumber'];
     $place=$_POST['place'];
     $password=$_POST['password'];
     $cate=$_POST['cate'];
     $qryCheck = "SELECT * FROM `login` WHERE `uname` ='$email'";
     $resCheck = mysqli_query($con,$qryCheck);
     $count = mysqli_num_rows($resCheck);
     if($count > 0)
     {
         echo "<script>alert('Username taken')</script>";
     }
     else
     {
         $qry="INSERT INTO `labour_reg`(`name`,`email`,`phonenumber`,`place`,`password`,`purpose`) VALUE ('$name','$email','$phonenumber','$place','$password','$cate')";
         $res = mysqli_query($con,$qry);
         $qrylogin="INSERT INTO `login`(`uid`,`uname`,`password`,`utype`) VALUE((SELECT MAX(`l_id`) FROM `labour_reg`),'$email','$password','labours')";
         $res2 = mysqli_query($con,$qrylogin);
         if($res && $res2){
             echo "<script>alert('Registration successful')</script>";
         }else{
             echo "<script>alert('Error Occured')</script>"; 
         }
     }     
}
include "commonfooter.php";
?>
</html>
