<?php
session_start();
if(!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']){  //If user is not logged in
    header('location:index.php');
}

require '../partials/_dbconnect.php'; //Connect to DB

function formatDate($date)
{
    return date('g:i a', strtotime($date));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <?php require '../partials/_navbar_header.php'; ?>
    <title>Manage Staff</title>
    <!-- bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/employeeStyle.css">

</head>

<body>
    <?php require '../partials/_navbar.php'; ?>
    <div id="heading">
        <h3>
            Employee Details
        </h3>
    </div>
    <table class="employee" id="emp_table">
        <thead>
            <tr>
                <td class="headers">Emp-Id</td>
                <td class="headers">Name</td>
                <td class="headers">Designation</td>
                <td class="headers">Salary</td>
                <td class="headers">Phone</td>
                <td class="headers">Email</td>
                <td class="headers">Joining-Date</td>
                <td class="headers">Availability</td>
                <td class="headers">Edit Details</td>
                <td class="headers">Remove Employee</td>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetching data from employee table
            $sql = "select * from employee";
            $result = mysqli_query($conn, $sql);
            $avail = ["No", "Yes"];  // Employee availability
            while ($row = (mysqli_fetch_assoc($result))) {
                echo '<tr>';
                echo '<td>' . $row['empid'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['designation'] . '</td>';
                echo '<td>' . $row['salary'] . '</td>';
                echo '<td>' . $row['phone'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['doj'] . '</td>';
                if ($row['availability'] == NULL) {  //If employee is not Waiter
                    echo '<td>-</td>';
                } else {  //If employee is Waiter
                    echo '<td>' . $avail[$row['availability']] . '</td>';
                }
                echo "
            <td> <a href='editEmployee.php?empid=" . $row['empid'] . "' onclick='return checkedit()'class='btn btn-success px-4'>Edit</a></td>
            <td><a href='removeEmployee.php?empid=" . $row['empid'] . "' onclick='return checkdelete()' class='btn btn-danger'>Remove</a></td></tr>";
            }
            ?>
        </tbody>
    </table>
    <div class="d-flex justify-content-center mb-4">
        <a href="newEmployee.php" class="btn btn-primary">Add Employee</a>
    </div>

<!--    JQuery-->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<!--   Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!--    DataTables-->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>



    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>-->
    <script src="https://kit.fontawesome.com/8de4607864.js" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {  //Initialising DataTable with table
            $('#emp_table').DataTable();
        });

        function checkdelete() {
            return confirm('Record will be deleted');
        }

        function checkedit() {
            return confirm('Record will be edited');
        }
    </script>
<!--    Including Navbar Footer-->
    <?php require '../partials/_navbar_footer.php'; ?>

<!--bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>


</html>