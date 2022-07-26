<?php
session_start();
if(!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']){  //If user is not logged in
    header('location:index.php');
}

require '../partials/_dbconnect.php'; //Connecting to DB

    if(isset($_GET['empid']))  //If server receives GET request
    {

    $empid=$_GET['empid'];

    //Select employee which has to be removed and check also if he/she is free
    $q = "SELECT * FROM employee WHERE `availability`=1 and `empid`='$empid'";
    $r = mysqli_query($conn,$q);
    $num = mysqli_num_rows($r);
    if($num==1){ //It means the employee is free
        $query="delete from employee where empid='$empid'";
        $data=mysqli_query($conn,$query);
        if($data)
        {
            echo'<script>
                    alert("Record Deleted from Database");
                    window.location.href = "employeeDetails.php";
                </script>"';
        }

    }else{ //Employee is not free
        echo'<script>
                    alert("Waiter in use");
                    window.location.href = "employeeDetails.php";
                </script>"';
    }
}
?>
