
<?php
session_start();
if(!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']){
    header('location:index.php');
}
require '../partials/_dbconnect.php';


$showErr = false;
$success = false;
if($_SERVER['REQUEST_METHOD']=="POST"){
    $item_no = $_POST['item-no'];
//    echo $item_no;
    $item_name = $_POST['item-name'];
    $item_price = $_POST['item-price'];

//    $query = "SELECT * FROM MENU WHERE MENU.'item-no'='$item_no'";
//    $result = mysqli_query($conn,$query);
//    echo var_dump($result);
//    echo mysqli_error($conn);
//    $num = mysqli_num_rows($result);

    $query = "INSERT INTO MENU VALUES('$item_no','$item_name','$item_price')";
    $result = mysqli_query($conn,$query);
    if(!$result){
        $showErr = 'Item Already Exists!';
    }else{
        echo mysqli_error($conn);
        $success = true;
    }


}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/newItemStyle.css">


</head>
<body>

<div class="editEmployee">
    <div class="heading d-flex justify-content-center my-4">
        <h3>Add New Item</h3>
    </div>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <div class="form-group">
            <div class="row d-flex justify-content-evenly mb-5">

                <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                    <label for="item-no">Item No.</label>
                </div>
                <div class="col-9">
                    <input type="text" class="form-control" id="item-no" name="item-no"  placeholder="Enter Item No." required>
                </div>
            </div>

            <?php
            if($showErr){
                echo '<div class="alert alert-danger" role="alert">'
                    .$showErr.
                    '</div>';
            }
            if($success){
                echo '<div class="alert alert-success" role="alert">
                            Item inserted successfully!
                        </div>';
            }
            ?>

            <div class="d-flex justify-content-center mb-5">
                <button class="btn btn-success">Add Item</button>
            </div>
        </div>

    </form>
    <div class="d-flex justify-content-center mb-5">
        <a href="menu.php"><button class="btn btn-primary">Go Back</button></a>
    </div>

</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
