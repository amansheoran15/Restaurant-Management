<?php
session_start();
if(!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']){  //If user is not logged in
    header('location:index.php');
}
require '../partials/_dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {  //If server gets a GET request
    $res_no = $_GET['rn'];  //Getting reservation number from get request

    //Fetching corresponding details to Res No.
    $query = "SELECT * FROM `reservation` WHERE `res_no` = '$res_no'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $nm = $row['Name'];
    $mn = $row['Mobile'];
    $em = $row['Email'];
    $c = $row['Count'];
    $t = $row['time'];
    $tableNo = $row['table_no'];
}

if ($_POST['Update']) {  //If server gets a POST request
    $res_no = $_POST['res_no'];
    $name  = $_POST['Name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['Email'];
    $count = $_POST['Count'];
    $time  = $_POST['Time'];
    $oldTime = $_POST['old-time'];
    $table = $_POST['table-no'];

    // If time slot is changed
    if ($oldTime != $time) {
        //Setting the old table to free
        $query4 = "UPDATE `reserved` SET `reserved`.`$oldTime`=1 WHERE `reserved`.`table-no` = '$table'";
        $result4 = mysqli_query($conn, $query4);

        if ($result4) {
            // Getting table to be reserved for new time slot
            $query3 = "SELECT * from `reserved` where `reserved`.`$time`=1 LIMIT 1";
            $data3 = mysqli_query($conn, $query3);
            $num = mysqli_num_rows($data3);

            //If no tables are free for that slot
            if ($num == NULL) {
                echo "<script> alert('Sorry,all tables are booked. Try another time slot.')</script>";
            } else {
                $row3 = mysqli_fetch_assoc($data3);
                $tableNo = $row3['table-no'];

                //Updating Reservation details
                $query5 = "UPDATE `reservation` SET `Name`='$name',`Mobile` = '$mobile',`Email`='$email', `Count`= '$count',`time`='$time',`table_no` = '$tableNo' WHERE `res_no`='$res_no'";
                $result5 = mysqli_query($conn, $query5);
                if ($result5) {
                    //Setting the reserved table as taken
                    $query6 = "UPDATE `reserved` SET `reserved`.`$time`=0 WHERE `reserved`.`table-no` = '$tableNo'";
                    $result6 = mysqli_query($conn, $query6);
                    if ($result6) {
                        echo '<script> 
                                  alert("Reservation edited");
                                  window.location.href = "viewreservation.php";
                              </script>;';
                    }
                }
            }
        }
    } else {  //If time slot is not changed

        // Updating reservation data
        $query2 = "UPDATE `reservation` SET `Name`='$name',`Mobile` = '$mobile',`Email`='$email', `Count`= '$count' WHERE `res_no`='$res_no'";
        $data = mysqli_query($conn, $query2);
        if ($data) {
            echo '<script> 
                        alert("Reservation edited");
                        window.location.href = "viewreservation.php";
                    </script>;';
        }
    }

    //    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Reservation</title>

<!--    Datatables-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

<!--    Navbar header-->
    <?php require '../partials/_navbar_header.php'; ?>

<!--    Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/editreservation.css">
</head>

<body>
    <!--Navbar Body-->
    <?php require '../partials/_navbar.php'; ?>

    <div class="reservation">
        <div class="heading d-flex justify-content-center my-3">
            <h3>Edit Reservation</h3>
        </div>

<!--        Form for editing reservation-->
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="form-group">
                <div class="row d-flex justify-content-evenly mb-3">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                        <label for="name">Name:</label>
                    </div>
                    <div class="col-9">
                        <input type="text" name="Name" value="<?php echo $nm; ?>" class="form-control" id="name" placeholder="Name">
                    </div>
                </div>
                <div class="row d-flex justify-content-evenly my-3">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                        <label for="phone">Mobile Number:</label>
                    </div>
                    <div class="col-9">
                        <input type="text" name="mobile" value="<?php echo $mn; ?>" class="form-control" id="mobile" placeholder="Mobile Number">
                    </div>
                </div>
                <div class="row d-flex justify-content-evenly my-3">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                        <label for="exampleInputEmail1">Email address</label>
                    </div>
                    <div class="col-9">
                        <input type="email" name="Email" value="<?php echo $em; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                </div>
                <div class="row d-flex justify-content-evenly my-3">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                        <label for="inlineFormCustomSelectPref" class="form-label">How many?: </label>
                    </div>
                    <div class="col-9">
                        <select class="form-select" name="Count" id="inlineFormCustomSelectPref">
<!--                            Option is selected according to DB-->
                            <option selected disabled>Number of people</option>
                            <option value="1" <?php if ($c == '1') echo "selected"; ?>>One</option>
                            <option value="2" <?php if ($c == '2') echo "selected"; ?>>Two</option>
                            <option value="3" <?php if ($c == '3') echo "selected"; ?>>Three</option>
                            <option value="4" <?php if ($c == '4') echo "selected"; ?>>Four</option>
                            <option value="5" <?php if ($c == '5') echo "selected"; ?>>Five</option>
                        </select>
                    </div>
                </div>

                <div class="row d-flex justify-content-evenly my-3">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                        <label for="slots" class="form-label mt-1">Select time Slot: </label>
                    </div>
                    <div class="col-9">
                        <select class="form-select" name="Time" id="inlineFormCustomSelectPref">
                            <option selected disabled>Time slot</option>
                            <option value="7:00" <?php if ($t == '7:00') echo "selected"; ?>>7:00-7:50 </option>
                            <option value="8:00" <?php if ($t == '8:00') echo "selected"; ?>>8:00-8:50</option>
                            <option value="9:00" <?php if ($t == '9:00') echo "selected"; ?>>9:00-9:50</option>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="res_no" value="<?php echo $res_no; ?>" />
                <input type="hidden" name="old-time" value="<?php echo $t; ?>" />
                <input type="hidden" name="table-no" value="<?php echo $tableNo; ?>" />
                <div class="d-flex justify-content-center mb-3">
                    <input type="submit" class="btn btn-success" id="reserveBtn" name="Update" placeholder="Update" value="Update">
                </div>
            </div>
            <div class="form-group">
        </form>
    </div>
    </div>

<!--    Including Navbar Footer-->
    <?php require '../partials/_navbar_footer.php'; ?>

    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>


</html>