<?php
include "commonheader.php";
?>
    <!-- inner banner -->
    <section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-5 pb-sm-4 pb-2">
                <h4 class="inner-text-title font-weight-bold pt-5">Login</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="index.html">Home</a></li>
                    <li class="active"><i class="fas fa-angle-right mx-2"></i>Login</li>
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
                <!-- <h5 class="sub-title">Add your</h5> -->
                    <h3 class="title-style">Login</h3>  
                    <!-- <h5 class="sub-title">Here</h5> -->
                </div>
                <div class="row d-flex justify-content-center align-items-center w-100">
                    <div class="col-md-6 contacts12-main">
                        <form  method="post" class="main-input">
                        <div class="row top-inputs">
                                    <div class="col-md-12">
                                        <input type="text" name="email" placeholder="Email" id="w3lSender" required="">
                                    </div>
                            
                                    <div>
                                        <input type="password" placeholder="password" name="password" id="w3lName" required="">
                                    </div>
                                <!-- <input type="submit" name="SUBMIT" value="SUBMIT"> -->
                                <div class="text-end ">
                                    <button type="submit" name="SUBMIT" class="btn btn-style w-100">Login</button>
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
        <!-- contact map -->
    
    <!-- //contact -->
    
    <!-- theme switch js (light and dark)-->
    <script src="assets/js/theme-change.js"></script>
    <!-- //theme switch js (light and dark)-->

</body>
<?php
    if(isset($_POST['SUBMIT']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $qryCheck = "SELECT * FROM `login` WHERE `uname` ='$email'";
        $resCheck = mysqli_query($con,$qryCheck);
        $row = mysqli_fetch_array($resCheck);
        $count = mysqli_num_rows($resCheck);
        if($count == 0)
        {
            echo "<script>alert('User dosent exists')</script>";
        }
        else
        {
            if($row['password'] == $password)
            {
                if($row['status'] == 'Approved')
                {
                    $_SESSION['uid'] = $row['uid'];
                    if($row['utype'] == "admin")
                    {
                        echo "<script>alert('Hii admin');location='admin/admin_home.php'</script>";
                    }
                    elseif($row['utype'] == "labours")
                    {
                        echo "<script>alert('Welcome labour');location='labour/labour_home.php'</script>";
                    }
                    elseif($row['utype'] == "users")
                    {
                        echo "<script>alert('Welcome to user portal');location='user/user_home.php'</script>";
                    }
                    elseif($row['utype'] == "dboy")
                    {
                        echo "<script>alert('Welcome to delivery boy portal');location='dboy/dboy_home.php'</script>";
                    }
                }
                elseif($row['status'] == 'Pending')
                {
                    echo "<script>alert('Not approved for login')</script>";
                }
            }
            else
            {
                echo "<script>alert('Incorrect Password')</script>";
            }
        }
    }   
    include "commonfooter.php";
    ?>
</html>

