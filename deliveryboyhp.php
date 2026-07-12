<?php
session_start();
{
$con=new mysqli("localhost","root","","home");
$did= $_SESSION['bid'];
$dtu= "select * from deliveryboytable where deliveryboyid='$did'";
$redtu=mysqli_query($con,$dtu);
$rowdtu=mysqli_fetch_array($redtu);
$bemail=$rowdtu['email'];
}
?>
<DOCTYPE html>
    <html>
        <head>
            <title>homepage</title>
</head>
<body>
<h1>deliverboy <?php echo $rowdtu['name'] ?> <h1>  
<form method="post">
Name: <input type="text" name="name" value="<?php echo $rowdtu['name'] ?>"><br>
Email: <input type="email" name="email" value="<?php echo $rowdtu['email'] ?> "><br>
phonenumber: <input type="tel" name="phonenumber" value="<?php echo $rowdtu['phonenumber'] ?>"><br>
Address:<textarea name="Address" value=""><?php echo $rowdtu['address']?><textarea><br>
city: <input type="text" name="city" value="<?php echo $rowdtu['city'] ?>"><br>
status: <input type="text" name="status" value="<?php echo $rowdtu['status'] ?>"><br>
update: <input type="text" name="update" value="<?php echo $rowdtu['update'] ?>"><br>

<br>
<input type="submit" name="SUBMIT" value="SUBMIT">
<?php
$con=new mysqli("localhost","root","","home");
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
    
$qry="update deliveryboytable set name='$name',phonenumber='$phonenumber',email='$email',address='$address',location='$location',city='$city',status='$status',update='$update' where deliveryboyid='$bid'";
echo $qry;
$qrylogin="update logintable set name='$email',password='$password' where name='$bemail'";
echo $qrylogin;


if (mysqli_query($con,$qry)==true && mysqli_query($con,$qrylogin))
{
    echo"<script> alert('value inserted');location='deliveryboyhp.php'</script>";
}
}
 ?>
</form>
</body>
</html>