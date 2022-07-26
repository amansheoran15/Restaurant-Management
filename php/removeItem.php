]<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']){ //If user is not logged in
        header('location:index.php');
    }
    require '../partials/_dbconnect.php'; //Connecting to DB

    if($_POST['removeItem']){
        $itemNum = $_POST['itemNum'];

        //Query to remove item
        $query = "DELETE FROM `MENU` WHERE `MENU`.`item-no` = '$itemNum'";
        $result = mysqli_query($conn, $query);

        if($result){
            echo "success";
        }else{
            echo "failed";
        }
    }
?>
