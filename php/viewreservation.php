<?php
session_start();
if(!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']){  //If user is not logged in
    header('location:index.php');
}

require '../partials/_dbconnect.php';  //Connecting to DB
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reservations</title>

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

<!--    Including Navbar header-->
    <?php require '../partials/_navbar_header.php'; ?>

<!--    Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/viewreservation.css">
</head>
<body>
<!--Including Navbar body-->
<?php require '../partials/_navbar.php'; ?>


<div class="table-div">
    <div id="heading">
        <h3>
            Reservation Details
        </h3>
    </div>
    <table class="viewreservation" id="reservation-table">
        <thead>
        <tr>
            <td class="headers">Reservation No.</td>
            <td class="headers">Name</td>
            <td class="headers">Mobile No.</td>
            <td class="headers">Email</td>
            <td class="headers">Number of people</td>
            <td class="headers">Time Slot</td>
            <td class="headers">Table No.</td>
            <td class="headers">Edit Details</td>
            <td class="headers">Cancel</td>
        </tr>
        </thead>

        <tbody>
        <?php
        // Fetching data from reservation table
          $sql="select * from reservation";
          $result= mysqli_query($conn,$sql);

          //Displaying Reservation data
          while($row=(mysqli_fetch_assoc($result)))
          {
            echo"
            <tr><td>".$row['res_no']."</td>
            <td>".$row['Name']."</td>
            <td>".$row['Mobile']."</td>
            <td>".$row['Email']."</td>
            <td>".$row['Count']."</td>
            <td>".$row['time']."</td>
            <td>".$row['table_no']."</td>
            <td> <a href='editReservation.php?rn=".$row['res_no']."' onclick='return checkedit()' class='btn btn-success px-4'>Edit</a></td>
            <td><a href='cancelreservation.php?rn=".$row['res_no']."' onclick='return checkdelete()' 
            class='btn btn-danger'>Cancel</a></td></tr>";
          }
        ?>
        </tbody>
    </table>
</div>
    <div class="d-flex justify-content-center mb-4">
        <a href="reservation.php" class="btn btn-primary">New Reservation</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script>
        // Setting up datatable for the table
        $(document).ready( function () {
            $('#reservation-table').DataTable();
        } );

        //Functions used to confirm change
        function checkdelete()
        {
            return confirm('Are you sure you want to cancel the reservation?');
        }
        function checkedit()
        {
            return confirm('Are you sure you want to edit the reservation?');
        }
    </script>

<!--    Including Navbar Footer-->
    <?php require '../partials/_navbar_footer.php'; ?>
</body>

<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>-->
</html>