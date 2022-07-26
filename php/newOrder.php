
<?php
session_start();
if(!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']){  //If user is not logged in
    header('location:index.php');
}
require '../partials/_dbconnect.php'; //Connecting to DB
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/updateOrder.css">

</head>
<body>

<div class="editOrder">
    <div class="heading d-flex justify-content-center my-4">
        <h3>Place New Order</h3>
    </div>
     <form>
        <div class="form-group">
            <div class="row d-flex justify-content-evenly mb-5">
                <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                    <label for="item-no">Order No.</label>
                </div>
                <div class="col-9">
                    <input type="text" class="form-control" id="order-no" name="order-no"  placeholder="Enter Order No." required>
                </div>
            </div>

            <div class="row d-flex justify-content-evenly mb-5">
                <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                    <label for="item-no">Table No.</label>
                </div>
                <div class="col-9">
                <select class="form-select" name='table-no' id="table-no" aria-label="Default select example">
                         <option selected>Select Table</option>
                        <?php
                            //Fetch free table details
                            $query = "SELECT * FROM `tablemang` where `isFree` = 1";
                            $result = mysqli_query($conn, $query);

                            //Displaying options of free tables
                            while($row = mysqli_fetch_assoc($result)){
                                echo '<option value="'.$row['table-no'].'">'.$row['table-no'].'</option>';
                            }
                        ?>
                        </select>
                </div>
            </div>
            
            <div class="items">
                <div class="row d-flex justify-content-evenly mb-3">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                        <label for="item-no">Item</label>
                    </div>
                    <div class="col-6">
                        <select class="form-select" name='item-no' aria-label="Default select example">
                         <option selected>Open this select menu</option>
                        <?php
                            // Fetch details from menu
                            $query = "SELECT * FROM `menu`";
                            $result = mysqli_query($conn, $query);

                            //Display menu details
                            while($row = mysqli_fetch_assoc($result)){
                                echo '<option value="'.$row['item-no'].'">'.$row['item-name'].' | ₹'.$row['item-price'].'</option>';
                            }
                        ?>
                        </select>
                    </div>
                    <div class="col-1">
                        <input class="form-control" type="number" name="qty" placeholder="Enter qty" value="1">
                    </div>
                    <div class="col-1">
                        <button class="btn btn-danger" onclick="removeItemBTN(this)">Delete</button>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center mb-5">
                <span class="btn btn-success addItem">Add Item</span>
            </div>

            <div class="d-flex justify-content-center mb-5">
                <button class="btn btn-success addOrder" >Add Order</button>
            </div>
        </div>
     </form>

    <div class="d-flex justify-content-center mb-5">
        <a href="transaction.php"><button class="btn btn-primary">Go Back</button></a>
    </div>

</div>

<!--    JQuery-->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<!--    Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <script>
        function removeItemBTN(e){ //Remove Item
            $(e).parent().parent().remove();
        }

        $(document).ready(function(){   
            $('.addItem').click(function(){
                //Ajax request to add item
                $.ajax({
                    url: "itemslist.php",
                    method: "GET",
                    success: function (data) {
                    //    console.log(data);
                       $('.items').append(data);
                    }
                })
                
            });

            $('.addOrder').click(function(){
                let orderNo = $('#order-no').val();
                let tableNo = $('#table-no').val();
                let qtys = $("input[name='qty']");

                let items = [];
                let i = 0;

                //Add items into array
                $("select[name='item-no']").each(function() {
                    items.push({ itemNo: $(this).val(), qty: qtys.get(i).value});
                    i++;
                });

                //AJAX request to add order
                $.ajax({
                    url: "addOrder.php",
                    method: "POST",
                    datatype: "JSON",
                    data: {
                        orderNo: orderNo,
                        tableNo: tableNo,
                        items: items,
                    },
                    success: function (data) {
                        window.location.href = "transaction.php";
                    }
                })
            })

        });
    </script>
    </body>

</html>
