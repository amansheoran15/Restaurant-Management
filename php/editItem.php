<?php
session_start();
if(!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']){  //If user is not logged in
    header('location:index.php');
}
require '../partials/_dbconnect.php';


if ($_SERVER['REQUEST_METHOD'] == 'GET') {   //If server gets GET request method
    //Getting Item Number from GET request
    $itemNum = $_GET['itemNum'];

    //Fetching Corresponding details to Item Number
    $query = "SELECT * FROM `MENU` WHERE `MENU`.`item-no` = '$itemNum'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {   //If server gets POST request method
    //Getting details from POST request
    $itemNum = $_POST['item-no'];
    $itemName = $_POST['item-name'];
    $itemPrice = $_POST['item-price'];

    //Updating the details
    $query = "UPDATE `MENU` SET `item-name` = '$itemName',`item-no` = '$itemNum' ,`item-price` = '$itemPrice'WHERE `MENU`.`item-no` = '$itemNum';";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        $showErr = 'Item Already Exists!';
    } else {
        header('Location:menu.php');  //Redirecting to menu page once item is succesfully updated
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee Details</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/editItemStyle.css">

</head>

<body>

    <div class="editItem">
        <div class="heading d-flex justify-content-center my-4">
            <h3>Edit Item Details</h3>
        </div>

<!--        Form for editing item details-->
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="form-group">
                <div class="row d-flex justify-content-evenly my-5">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                        <label for="item-no">Item No.</label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="form-control" id="item-no" name="item-no" value="<?php echo $row['item-no'] ?>" required>
                    </div>
                </div>
                <div class="row d-flex justify-content-evenly mb-5">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                        <label for="item-name">Item Name</label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="form-control" id="item-name" name="item-name" value="<?php echo $row['item-name'] ?>" required>
                    </div>
                </div>
                <div class="row d-flex justify-content-evenly my-5">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                        <label for="Item Price">Item Price</label>
                    </div>
                    <div class="col-9">
                        <input type="number" class="form-control" id="email" name="item-price" value="<?php echo $row['item-price'] ?>" required>
                    </div>
                </div>

                <?php
                // If changed item number already exists
                if ($showErr) {
                    echo '<script>
                            alert("' . $showErr . '");
                            window.location = "menu.php";
                            </script>';
                }
                ?>

                <div class="d-flex justify-content-center mb-5">
                    <button class="btn btn-success">Update</button>
                </div>
            </div>
        </form>
        <div class="d-flex justify-content-center mb-5">
            <a href="menu.php"><button class="btn btn-primary">Go Back</button></a>
        </div>
    </div>

    <!--bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>