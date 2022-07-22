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
            <td class="headers">Sno.</td>
            <td class="headers">Order ID</td>
            <td class="headers">Table No.</td>
            <td class="headers">Order Items</td>
            <td class="headers">Date/Time</td>
            <td class="headers">Payment</td>

        </tr>
        </thead>
        <tbody>

        <?php
        $query = "SELECT * FROM `orders` where `paid` = 0";
        $result = mysqli_query($conn,$query);
        $sno = 1;
        while($row = mysqli_fetch_assoc($result)){
            echo '<tr>';
            echo '<td>'.$sno.'</td>';
            echo '<td class="orderId">'.$row['oid'].'</td>';
            echo '<td>'.$row['table-no'].'</td>';
            echo '<td>
            <a href="receipt.php?oid='.$row['oid'].'" target="_blank" class="btn btn-success">View</a>
            <a href="receipt.php?oid='.$row['oid'].'" target="_blank" class="btn btn-success">Update</a>
            </td>';
            echo '<td>'.$row['date'].'</td>';
            echo '<td><a class="btn btn-success" onclick="payBill(this)">Pay</a></td>';
            echo '</tr>';
            $sno++;
        }
        ?>
        </tbody>

    </table>
</div>
<div class="d-flex justify-content-center mb-4">
    <a href="newOrder.php" class="btn btn-info">New Order</a>
</div>
<div class="table-div">
    <h3>Completed Orders</h3>
    <table class="items" id="currorder_table">
        <thead>
        <tr>
            <td class="headers">SNo.</td>
            <td class="headers">Order ID</td>
            <td class="headers">Table No.</td>
            <td class="headers">Date/Time</td>
            <td class="headers">Receipt</td>
        </tr>
        </thead>
        <tbody>

        <?php
        $query = "SELECT * FROM `orders` where `paid` = 1";
        $result = mysqli_query($conn,$query);
        $sno = 1;
        while($row = mysqli_fetch_assoc($result)){
            echo '<tr>';
            echo '<td>'.$sno.'</td>';
            echo '<td class="itemNum">'.$row['oid'].'</td>';
            echo '<td>'.$row['table-no'].'</td>';
            echo '<td>'.$row['date'].'</td>';
            echo '<td><a href="receipt.php?oid='.$row['oid'].'" target="_blank" class="btn btn-success">Receipt</a></td>';
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

    function payBill(e){
        let oid = e.parentElement.parentElement.querySelector('.orderId').innerText;

        console.log(oid);
        
        $.ajax({
            url: "payBill.php",
            method: "POST",
            data: {
                oid: oid,
            },
            success: function (data) {
                console.log(data);
                location.reload(true);
            }
        })
    }
</script>

<?php require '../partials/_navbar_footer.php'; ?>
</body>
</html>
