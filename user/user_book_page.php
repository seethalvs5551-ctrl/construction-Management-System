<?php
include "user_header.php";
?>
    <!-- inner banner -->
    <section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-5 pb-sm-4 pb-2">
                <h4 class="inner-text-title font-weight-bold pt-5">Book</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="user_home.php">User</a></li>
                    <li class="active"><i class="fas fa-angle-right mx-2"></i>Labours</li>
                    <li class="active"><i class="fas fa-angle-right mx-2"></i>Book</li>
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
                            <div class="col-md-12">
                                <label for="from">From date :</label>
                                <input type="date" id="from" name="from">
                            </div>
                        </div>
                        <div class="row top-inputs">
                            <div class="col-md-12">
                                <label for="to">To date :</label>
                                <input type="date" id="to" name="to">
                            </div>
                        </div>
                        <div class="row top-inputs">
                            <div class="col-md-12">
                                <!-- <label for="to">To date :</label> -->
                                 <textarea name="description" placeholder="Description about the work" id="" required></textarea>
                            </div>
                        </div> 
                                <div class="text-end ">
                                    <button type="submit" name="SUBMIT" class="btn btn-style w-100">Request</button>
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


    <!-- theme switch js (light and dark)-->
    <script src="../assets/js/theme-change.js"></script>
    <!-- //theme switch js (light and dark)-->

    <script>
        // Define the minimum date value (for example, today's date)
        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0'); // Months are zero-indexed
        const day = String(today.getDate()).padStart(2, '0');

        const minDate = `${year}-${month}-${day}`;

        // Get the date input element by its ID
        const dateInput = document.getElementById('from');

        // Set the min attribute using the formatted date
        dateInput.setAttribute('min', minDate);

        document.getElementById('from').addEventListener('change', function() 
        {
            var minDate = this.value;
            document.getElementById('to').setAttribute('min', minDate);
        });
    </script>
</body>
<?php
$uid = $_SESSION['uid'];
$lid = $_GET['lid'];
$today = date("Y-m-d");
if(isset($_POST['SUBMIT']))
{
    $from=$_POST['from'];
    $to=$_POST['to'];
    $description=$_POST['description'];
    $qry="INSERT INTO `book_request` (`date`,`u_id`,`l_id`,`from`,`to`,`description`) VALUE ('$today','$uid','$lid','$from','$to','$description')";
    $res = mysqli_query($con,$qry);
    if($res){
        echo "<script>alert('Requested')</script>";
    }else{
        echo "<script>alert('Error Occured')</script>"; 
    }
}
    include "../commonfooter.php";
?>
</html>

