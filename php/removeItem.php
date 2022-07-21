]<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']){
        header('location:index.php');
    }
    require '../partials/_dbconnect.php';

    if($_POST['removeItem'] == true){
        $itemNum = $_POST['itemNum'];

        echo $itemNum;

//        $query = "Delete from menu where 'item-no' = '$itemNum'";
        $query = "DELETE FROM `MENU` WHERE `MENU`.`item-no` = '$itemNum'";
//        $query = "DELETE FROM `MENU` WHERE `MENU`.`item-no` = '$itemNum'";
        $result = mysqli_query($conn, $query);

        if($result){
            echo "success";
        }else{
            echo "failed";
        }
    }


//    $query = "DELETE FROM MENU WHERE 'item-no'"
?>
