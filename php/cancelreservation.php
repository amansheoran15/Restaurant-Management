<?php
require '../partials/_dbconnect.php';
if(isset($_GET['rn']))
{

        $rn=$_GET['rn'];
        $query1 = "select * from `reservation` where `res_no`='$rn'";
        $result = mysqli_query($conn,$query1);
        $row = mysqli_fetch_assoc($result);
        $tableNo = $row['table_no'];
        $time = $row['time'];
//        echo'<script> alert("'.$rn.'")</script>';
        $query2="delete from `reservation` where `res_no`='$rn'";
        $data=mysqli_query($conn,$query2);
        if($data)
        {
            $query3 = "UPDATE `reserved` SET `$time`=1 where `table-no`='$tableNo'";
            $result3 = mysqli_query($conn,$query3);
            echo'<script> alert("Reservation cancelled")</script>

            <meta http-equiv="refresh"
            content="1; url = viewreservation.php" />';

        }
}
?>