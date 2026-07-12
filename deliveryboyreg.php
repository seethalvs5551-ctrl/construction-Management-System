
<?php

include "commonheader.php";
include "connection.php";
?>
    <!-- inner banner -->
    <section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-5 pb-sm-4 pb-2">
                <h4 class="inner-text-title font-weight-bold pt-5">deliveryboy registration</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="index.html">Home</a></li>
                    <li class="active"><i class="fas fa-angle-right mx-2"></i>Contact</li>
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
                    <h5 class="sub-title">Get In Touch</h5>
                    <h3 class="title-style">Contact Us</h3>
                </div>
                <div class="row">
                    <div class="col-md-8 contacts12-main">
                        <form  method="post" class="main-input">
                            <div class="row top-inputs">
                               
                                    <input type="text" placeholder="Name" name="name" id="w3lName" required="">
                             
                                    <input type="email" name="email" placeholder="Email" id="w3lSender" required="">
                            
                                    <input type="tel" placeholder="Phone Number" name="phonenumber" id="w3lName" required="" pattern="[6789][0-9]{9}" maxlength="10">
                        
                                    <input type="text" name="address" placeholder="Address" id="w3lSender" required="">

                                    <input type="text" name="city" placeholder="city" id="w3lSender" required="">

                                    <input type="text" name="status" placeholder="status" id="w3lSender" required="">

                                    <input type="text" name="update" placeholder="update" id="w3lSender" required="">
                             </div>
                            <div class="text-end">
                            <input type="submit" name="SUBMIT" value="SUBMIT">
                                <button type="submit" class="btn btn-style">Send Now</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4 ps-lg-5 mt-md-0 mt-4">
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact map -->
    <section class="w3l-contacts-1">
        <div class="contacts">
            <div class="contacts-content">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158858.47340002653!2d-0.24168120642536509!3d51.52855824164916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C+UK!5e0!3m2!1sen!2sin!4v1562822037850!5m2!1sen!2sin"
                    width="100%" height="650" frameborder="0" style="border:0" allowfullscreen></iframe>
                <address>
                    <h4>London</h4>
                    <a href="mailto:hello@w3layouts.com">Email: hello@w3layouts.com</a>
                    <a href="tel:8-800-999-800">Tel: 8-800-999-800</a>
                </address>
            </div>
        </div>
    </section>
    <!-- //contact -->

    <!-- footer -->

    <?php
if(isset($_POST['SUBMIT']))
{
     $name=$_POST['name'];
     $phonenumber=$_POST['phonenumber'];
     $email=$_POST['email'];
     $address=$_POST['address'];
     $location=$_POST['location'];
     $city=$_POST['city'];
     $staus=$_POST['status'];
     $update=$_POST['update'];
    
$qry="insert into deliveryboytable(name,phonenumber,email,address,location,city,status,update)values('$name','$phonenumber','$email','$address','$location','$city','$status','$update')";
echo $qry;
$qrylogin="insert into logintable(name,password,usertype,status)values('$email','$password','deliveryboy','active')";
echo $qrylogin;

if (mysqli_query($con,$qry)==true && mysqli_query($con,$qrylogin))
{
    echo"<script> alert('value inserted');</script>";
}
}
?>

<?php
include "commonfooter.php";
?>
   