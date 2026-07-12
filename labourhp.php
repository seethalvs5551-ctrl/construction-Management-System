<?php
session_start();
{
$con=new mysqli("localhost","root","","home");
$sid= $_SESSION['uid'];
$stu= "select * from labourhp where labourid='$sid'";
$restu=mysqli_query($con,$stu);
$rowstu=mysqli_fetch_array($restu);
$aemail=$rowstu['email'];
}
?>
<DOCTYPE html>
    <html>
        <head>
            <title>homepage</title>
</head>
<body>
<h1>labour<?php echo $rowstu['name'] ?> <h1>  
<form method="post">
Name: <input type="text" name="name" value="<?php echo $rowstu['name'] ?>"><br>
Email: <input type="email" name="email" value="<?php echo $rowstu['email'] ?> "><br>

phonenumber: <input type="text" name="phonenumber" value="<?php echo $rowstu['phonenumber'] ?>"><br>
place: <input type="place" name="place" value="<?php echo $rowstu['place'] ?>"><br>
password: <input type="password" name="password" value="<?php echo $rowstu['password'] ?>"><br>
<br>
<input type="submit" name="SUBMIT" value="SUBMIT">
<?php
$con=new mysqli("localhost","root","","home");
if(isset($_POST['SUBMIT']))
{
     $name=$_POST['name'];
     $email=$_POST['email'];
     $phonenumber=$_POST['phonenumber'];
     $place=$_POST['place'];
     $password=$_POST['password'];
    
$qry="update labourtable set name='$name',email='$email,phonenumber='$phonenumber',place='$place',password='$password' where labourid='$uid'";
echo $qry;
$qrylogin="update logintable set name='$email',password='$password' where name='$aemail'";
echo $qrylogin;
if (mysqli_query($con,$qry)==true && mysqli_query($con,$qrylogin))
{
    echo"<script> alert('value inserted');location='labourhp.php'</script>";
}
}
 ?>
</form>
</body>
</html>