<?php
session_start();
if(!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']){  //If user is not logged in
    header('location:index.php');
}

require '../partials/_dbconnect.php';  //Connecting to DB

if (isset($_GET['empid'])) {   //If the page recieves GET request

    $empid = $_GET['empid'];

    //Getting details of employee of corresponding emp id
    $query = "select * from employee where empid='$empid'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
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
    <link rel="stylesheet" href="../css/editEmployeeStyle.css">


</head>

<body>

    <div class="editEmployee">
        <div class="heading d-flex justify-content-center my-4">
            <h3>Edit Employee Details</h3>
        </div>

<!--        form for editing employee details-->
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="form-group">
                <div class="row d-flex justify-content-evenly mb-3">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                        <label for="empid">Emp Id</label>
                    </div>
                    <div class="col-9">
                        <input type="text" name="empid" class="form-control" id="empid" value="<?php echo $row['empid'] ?>">
                    </div>
                </div>
                <div class="row d-flex justify-content-evenly mb-3">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                        <label for="name">Name</label>
                    </div>
                    <div class="col-9">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" value="<?php echo $row['name'] ?>">
                    </div>
                </div>
                <div class="row d-flex justify-content-evenly my-3">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                        <label for="designation">Designation</label>
                    </div>
                    <div class="col-9">
                        <input type="text" name="desig" class="form-control" id="designation" placeholder="Enter designation" value="<?php echo $row['designation'] ?>">
                    </div>
                </div>
                <div class="row d-flex justify-content-evenly my-3">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                        <label for="email">Email address</label>
                    </div>
                    <div class="col-9">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter email address" value="<?php echo $row['email'] ?>">
                    </div>
                </div>
                <div class="row d-flex justify-content-evenly my-3">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                        <label for="salary">Salary</label>
                    </div>
                    <div class="col-9">
                        <input type="text" name="sal" class="form-control" id="salary" placeholder="Enter salary" value="<?php echo $row['salary'] ?>">
                    </div>
                </div>
                <div class="row d-flex justify-content-evenly my-3">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                        <label for="phone">Phone Number</label>
                    </div>
                    <div class="col-9">
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter ph. number" value="<?php echo $row['phone'] ?>">
                    </div>
                </div>
                <div class="row d-flex justify-content-evenly my-3">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                        <label for="date" class="form-label">Date of Joining</label>
                    </div>
                    <div class="col-9">
                        <input type="date" name="doj" id="joinDate" class="form-control" placeholder="Date" value="<?php echo $row['doj'] ?>">
                    </div>
                </div>

                <div class="d-flex justify-content-center mb-3">
                    <input type="submit" id="submitBtn" name="submit" placeholder="Update" value="Update Details">
                </div>
            </div>
        </form>
        <div class="d-flex justify-content-center mb-5">
            <a href="employeeDetails.php"><button class="btn btn-primary">Go Back</button></a>
        </div>
    </div>
    </div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {   //If page recieves POST request
        $name  = $_POST['name'];
        $empid2 = $_POST['empid'];
        $desig = $_POST['desig'];
        $sal   = $_POST['sal'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $doj  = $_POST['doj'];
        $avail = $_POST['avail'];

//        Updating details of employee
        $query = "UPDATE `employee` SET `name` = '$name', `empid` = '$empid2', `designation` = '$desig', `salary` = '$sal', `phone` = '$phone', `email` = '$email', `doj` = '$doj' WHERE `employee`.`empid` = '$empid2'";
        $data = mysqli_query($conn, $query);
        echo mysqli_num_rows($data);
        if ($data) {
            echo '<script>
                alert("Record edited");
                window.location.href = "employeeDetails.php";   //Redirecting to Employee Details Page
             </script>';
        }
    }
    ?>
</body>
<!--bootstrap js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>