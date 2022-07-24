<?php
require '../partials/_dbconnect.php';

    if(isset($_GET['empid']))
    {

    $empid=$_GET['empid'];
    $q = "SELECT * FROM employee WHERE `availability`=1 and `empid`='$empid'";
    $r = mysqli_query($conn,$q);
    $num = mysqli_num_rows($r);
    if($num==1){
        $query="delete from employee where empid='$empid'";
        $data=mysqli_query($conn,$query);
        if($data)
        {
            echo'<script>
                    alert("Record Deleted from Database");
                    window.location.href = "employeeDetails.php";
                </script>"';
        }

    }else{
        echo'<script>
                    alert("Waiter in use");
                    window.location.href = "employeeDetails.php";
                </script>"';
    }
}
?>
