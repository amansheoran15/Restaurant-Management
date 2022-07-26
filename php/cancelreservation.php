<?php
session_start();
if(!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']){  //If user is not logged in
    header('location:index.php');
}
require '../partials/_dbconnect.php';
if(isset($_GET['rn']))
{

        $rn=$_GET['rn'];  //Getting reservation number through get request

        //Query to get data corresponding to given reservation number
        $query1 = "select * from `reservation` where `res_no`='$rn'";
        $result = mysqli_query($conn,$query1);
        $row = mysqli_fetch_assoc($result);

        $tableNo = $row['table_no'];
        $time = $row['time'];

        //Query to delete the reservation
        $query2="delete from `reservation` where `res_no`='$rn'";
        $data=mysqli_query($conn,$query2);
        if($data)
        {
            //Setting the reserved table to free
            $query3 = "UPDATE `reserved` SET `$time`=1 where `table-no`='$tableNo'";
            $result3 = mysqli_query($conn,$query3);
            echo'<script>
                    alert("Reservation Cancelled");
                    window.location.href = "viewreservation.php";  //Redirecting to view reservation page
                 </script>
            ';

        }
}
?>