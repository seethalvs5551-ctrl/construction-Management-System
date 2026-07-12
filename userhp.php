
<?php
session_start();
{
$con=new mysqli("localhost","root","","home");
$mid= $_SESSION['nid'];
$mtu= "select * from usertable where userid='$mid'";
$remtu=mysqli_query($con,$mtu);
$rowmtu=mysqli_fetch_array($remtu);
$aemail=$rowmtu['email'];
}
?>
<DOCTYPE html>
    <html>
        <head>
            <title>homepage</title>
</head>
<body>
<h1>user <?php echo $rowmtu['name'] ?> <h1>  
<form method="post">
Name: <input type="text" name="name" value="<?php echo $rowmtu['name'] ?>"><br>
Age: <input type="number" name="age" value="<?php echo $rowmtu['age'] ?>"><br>
Email: <input type="email" name="email" value="<?php echo $rowmtu['email'] ?> "><br>
place: <input type="text" name="place" value="<?php echo $rowmtu['place'] ?> "><br>
Phonenumber: <input type="tel" name="phonenumber" value="<?php echo $rowmtu['phonenumber'] ?>"><br>
Password: <input type="password" name="password" value="<?php echo $rowmtu['password'] ?>"><br>
<br>
<input type="submit" name="SUBMIT" value="SUBMIT">
<?php
$con=new mysqli("localhost","root","","home");
if(isset($_POST['SUBMIT']))
{
     $name=$_POST['name'];
     $age=$_POST['age'];
     $email=$_POST['email'];
     $place=$_POST['place'];
     $phonenumber=$_POST['phonenumber'];
     $password=$_POST['password'];
    
$qry="update usertable set name='$name',age='$age',email='$email',place='$place',phonenumber='$phonenumber',password='$password' where userid='$nid'";

echo $qry;
$qrylogin="update logintable set name='$email',password='$password' where name='$aemail'";

echo $qrylogin;

if (mysqli_query($con,$qry)==true && mysqli_query($con,$qrylogin))
{
    echo"<script> alert('value inserted');location='userhp.php'</script>";
}
}
 ?>
</form>
</body>
</html>
