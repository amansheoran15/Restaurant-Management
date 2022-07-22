<?php
require '../partials/_dbconnect.php';

    if(isset($_GET['empid']))
    {

    $empid=$_GET['empid'];
    $query="delete from employee where empid='$empid'";
    $data=mysqli_query($conn,$query);
    if($data)
    {
        echo"<script> alert('Record Deleted from Database')</script>";
     ?>
         <meta http-equiv="refresh" 
          content="1; url = employeeDetails.php" />
     <?php
    }
}
?>
