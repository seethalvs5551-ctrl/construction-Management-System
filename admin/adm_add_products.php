<?php
include "admin_header.php";
$qry = "SELECT * FROM `products` ORDER BY(`p_id`)DESC";
$res = mysqli_query($con,$qry);
?>
    <!-- inner banner -->
    <section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-5 pb-sm-4 pb-2">
                <h4 class="inner-text-title font-weight-bold pt-5">Products</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="../index.html">Admin</a></li>
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
                <h5 class="sub-title">Add</h5>
                    <h3 class="title-style">Product details</h3>
                    <h5 class="sub-title">Here</h5>
                </div>
                <div class="row d-flex justify-content-center align-items-center w-100">
                    <div class="col-md-6 contacts12-main">
                        <form method="post" class="main-input" enctype="multipart/form-data">
                        <div class="row top-inputs">
                            <div class="col-md-12">
                                <input type="text" placeholder="Product name" name="p_name" id="w3lName" required="">
                            </div>
                            <div class="col-md-12">
                                <textarea type="text" name="p_desc" placeholder="Description" id="w3lSender" required=""></textarea>
                            </div>
                            <div class="col-md-12">
                                <input type="number" name="p_price" placeholder="Price in rupees" id="w3lSender" required="">
                            </div>
                        <div>
                        <input type="number" min="0" placeholder="Qty" name="p_qty" id="w3lName" required="">
                    </div>
                        <div>
                            <input type="file" class="prodPhoto" name="media" id="w3lName" required="">
                        </div>
                    <!-- <input type="submit" name="SUBMIT" value="SUBMIT"> -->
                    <div class="text-end ">
                        <button type="submit" name="SUBMIT" class="btn btn-style w-100">Add</button>
                    </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>

                <br><br>
                <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:500px;">
                <h5 class="sub-title">Manage</h5>
                    <h3 class="title-style">Products</h3>  
                    <!-- <h5 class="sub-title">Here</h5> -->
                </div>
                <div class="row d-flex justify-content-center align-items-center w-100">
                    <div class="col-md-10 contacts12-main">
                    <table class="table table-stripd table-primary text-center">
                        <tr>
                            <th>Product name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                        <?php
                            while($row = mysqli_fetch_array($res))
                            {

                        ?>
                                <tr>
                                <td><?php echo $row['p_name'] ?></td>
                                    <td><?php echo $row['p_desc'] ?></td>
                                    <td><?php echo $row['p_price'] ?></td>
                                    <td><img src="<?php echo $row['p_img']?>" alt="" style="width:100px"></td>
                                    <td><?php echo $row['p_qty'] ?></td>
                                    <td>
                                        <a href="adm_actions.php?action=del_prod&p_id=<?php echo $row['p_id'] ?>&targ=adm_add_products.php"><button class="btn btn-danger">Delete</button></a>
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
if(isset($_POST['SUBMIT']))
{
     $p_name=$_POST['p_name'];
     $p_desc=$_POST['p_desc'];
     $p_price=$_POST['p_price'];
     $p_qty=$_POST['p_qty'];
     $folder = '../static/media/';
     $file = $folder . basename($_FILES['media']['name']);
     move_uploaded_file($_FILES['media']['tmp_name'],$file);
     $qryCheck = "SELECT * FROM `products` WHERE `p_name` = '$p_name'";
     $resCheck = mysqli_query($con,$qryCheck);
     $count = mysqli_num_rows($resCheck);
     if($count > 0)
     {
         echo "<script>alert('Product already exists')</script>";
     }
     else
     {
         $qry="INSERT INTO `products`(`p_name`,`p_desc`,`p_price`,`p_img`,`p_qty`) VALUE ('$p_name','$p_desc','$p_price','$file','$p_qty')";
         $res = mysqli_query($con,$qry);
         if($res){
             echo "<script>alert('Product added successful')</script>";
         }else{
             echo "<script>alert('Error Occured')</script>"; 
         }
     }
     echo "<script>location.href = 'adm_add_products.php'</script>";

}
    include "../commonfooter.php";
?>
</html>

