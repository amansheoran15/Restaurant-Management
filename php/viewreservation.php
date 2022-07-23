<?php
require '../partials/_dbconnect.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reservation</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <?php require '../partials/_navbar_header.php'; ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/table.css">
</head>
<body>
<?php require '../partials/_navbar.php'; ?>
<div id="heading">
        <h3>
            Reservation Details
        </h3>
    </div>
    <table class="employee">
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
        <?php
          $sql="select * from reservation";
          $result= mysqli_query($conn,$sql);
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
            <td> <a href='editReservation.php?rn=".$row['res_no']."onclick='return checkedit()' class='btn btn-success px-4'>Edit</a></td>
            <td><a href='cancelreservation.php?rn=".$row['res_no']."' onclick='return checkdelete()' 
            class='btn btn-danger'>Cancel</a></td></tr>";
          }
        ?>      
    </table>
    <div class="d-flex justify-content-center mb-4">
        <a href="reservation.php" class="btn btn-info">New Reservation</a>
    </div>
    <script> 
        function checkdelete()
        {
            return confirm('Reservation will be cancelled');
        }
        function checkedit()
        {
            return confirm('Reservation will be edited');
        }
</script>
<?php require '../partials/_navbar_footer.php'; ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>