<?php
require '../partials/_dbconnect.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Transactions</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <?php require '../partials/_navbar_header.php'; ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/table.css">
</head>
<body>
<?php require '../partials/_navbar.php'; ?>
<div class="table-div">
    <h3>Current Orders</h3>
    <table class="items" id="transaction_table">
        <thead>
        <tr>
            <td class="headers">Order ID</td>
            <td class="headers">Table No.</td>
            <td class="headers">Order Items</td>
            <td class="headers">Date/Time</td>
            <td class="headers">Payment</td>

        </tr>
        </thead>
        <tbody>

        <?php
        $query = "SELECT * FROM TALEMANG";
        $result = mysqli_query($conn,$query);
        $sno = 1;
        while($row = mysqli_fetch_assoc($result)){
            if($row['isFree']==1){
                $free = "Yes";
            }else{
                $free = "No";
            }
            echo '<tr>';
            echo '<td>'.$sno.'</td>';
            echo '<td class="itemNum">'.$row['table-no'].'</td>';
            echo '<td>'.$row['capacity'].'</td>';
            echo '<td>'.$free.'</td>';
            if($row['waiter#-assign']==null){
                echo '<td><a href="#" class="btn btn-success px-4">Add</a></td>';
            }
//            echo '<td>'.$row['waiter#-assign'].'</td>';
            echo '<td><a href="editItem.php?itemNum='.$row['item-no'].'" class="btn btn-success px-4">Edit</a></td>
                            <td><a class="btn btn-danger" onclick="removeItem(this)">Remove</a></td>';
            echo '</tr>';
            $sno++;
        }
        ?>

        </tbody>

    </table>
</div>
<div class="d-flex justify-content-center mb-4">
    <a href="newItem.php" class="btn btn-info">New Order</a>
</div>
<div class="table-div">
    <h3>Previous Orders</h3>
    <table class="items" id="currorder_table">
        <thead>
        <tr>
            <td class="headers">Order ID</td>
            <td class="headers">Table No.</td>
            <td class="headers">Date/Time</td>
            <td class="headers">Receipt</td>

        </tr>
        </thead>
        <tbody>

        <?php
        $query = "SELECT * FROM TALEMANG";
        $result = mysqli_query($conn,$query);
        $sno = 1;
        while($row = mysqli_fetch_assoc($result)){
            if($row['isFree']==1){
                $free = "Yes";
            }else{
                $free = "No";
            }
            echo '<tr>';
            echo '<td>'.$sno.'</td>';
            echo '<td class="itemNum">'.$row['table-no'].'</td>';
            echo '<td>'.$row['capacity'].'</td>';
            echo '<td>'.$free.'</td>';
            if($row['waiter#-assign']==null){
                echo '<td><a href="#" class="btn btn-success px-4">Add</a></td>';
            }
//            echo '<td>'.$row['waiter#-assign'].'</td>';
            echo '<td><a href="editItem.php?itemNum='.$row['item-no'].'" class="btn btn-success px-4">Edit</a></td>
                            <td><a class="btn btn-danger" onclick="removeItem(this)">Remove</a></td>';
            echo '</tr>';
            $sno++;
        }
        ?>

        </tbody>

    </table>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>



<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>-->
<script src="https://kit.fontawesome.com/8de4607864.js" crossorigin="anonymous"></script>
<script>
    $(document).ready( function () {
        $('#transaction_table').DataTable();
    } );
    $(document).ready( function () {
        $('#currorder_table').DataTable();
    } );
</script>

<?php require '../partials/_navbar_footer.php'; ?>
</body>
</html>
