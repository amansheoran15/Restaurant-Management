<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'rms';

	$con = new mysqli($host,$user,$pass,$db_name);
    if(isset($_GET['empid']))
    {

    $empid=$_GET['empid'];
    $query="delete from employee where empid='$empid'";
    $data=mysqli_query($con,$query);
    if($data)
    {
        echo"<script> alert('Record Deleted from Database')</script>";
     ?>
         <meta http-equiv="refresh" 
          content="1; url = http://localhost/rms/employee/employee/employeeDetails.php" />
     <?php
    }
}
?>
