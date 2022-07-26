<?php
session_start();
if(!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']){  //If user is not logged in
    header('location:index.php');
}

require '../partials/_dbconnect.php'; //Connecting to DB
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reservation</title>

<!--    DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

<!--    Navbar Header-->
    <?php require '../partials/_navbar_header.php'; ?>

<!--    Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/table.css">
</head>
<div>
<!--Navbar Body-->
<?php require '../partials/_navbar.php'; ?>
<div class="reservation">
<div class="heading d-flex justify-content-center my-3">
            <h3>Reserve Table</h3>
        </div>
<!--    Form to reserve table-->
    <form action="#" method="POST">
    <div class="form-group">
                <div class="row d-flex justify-content-evenly mb-3">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                      <label for="name">Reservation number:</label>
                    </div>
                    <div< class="col-9">
                      <input type="text" name="res_no" class="form-control" id="name" placeholder="Reservation no.">
                    </div>    
                </div>
                <div class="row d-flex justify-content-evenly mb-3">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                        <label for="name">Name:</label>
                    </div>
                    <div class="col-9">
                        <input type="text" name="Name" class="form-control" id="name" placeholder="Name">
                    </div>
                </div>
                <div class="row d-flex justify-content-evenly my-3">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                        <label for="phone">Mobile Number:</label>
                    </div>
                    <div class="col-9">
                        <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Mobile Number">
                    </div>
                </div>
                <div class="row d-flex justify-content-evenly my-3">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                        <label for="exampleInputEmail1">Email address</label>
                    </div>
                    <div class="col-9">
                        <input type="email" name="Email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                </div>
                <div class="row d-flex justify-content-evenly my-3">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                <label for="inlineFormCustomSelectPref" class="form-label">How many?: </label>
                </div>
                <div class="col-9">
                <select class="form-select" name= "Count" id="inlineFormCustomSelectPref">
                    <option selected disabled>Number of people</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                    <option value="4">Four</option>
                    <option value="5">Five</option>
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
                    <option value="7:00">7:00-7:50 </option>
                    <option value="8:00">8:00-8:50</option>
                    <option value="9:00">9:00-9:50</option>
                </select>   
               </div>
            </div>
            <div class="d-flex justify-content-center mb-3">
                <input type ="submit" id="reserveBtn" name="reserve" class="btn btn-primary" placeholder="Reserve"value="Reserve">
                <button type="button" class="btn btn-secondary ml-10" id="view-reser" style="margin-left: 3rem;">View Reservations</button>
            </div>
</div>
    </form>
</div>

<?php
if(isset($_POST['reserve']))  //POST request
{
   $res_no  =$_POST['res_no']; 
   $name  = $_POST['Name'];
   $mobile = $_POST['mobile'];
   $email = $_POST['Email'];
   $count = $_POST['Count'];
   $time  =$_POST['Time'];

   //Query to fetch free table at that particular time slot
   $query="SELECT * from `reserved` where `reserved`.`$time`=1 LIMIT 1";
   $data=mysqli_query($conn,$query);
   $num=mysqli_num_rows($data);
   if($num==NULL) //If no free tables are available
    {
        echo"<script> alert('Sorry :( all tables are booked . Try another time slot')</script>";
    }
   else
   {
        $row= mysqli_fetch_assoc($data);
        $table = $row['table-no'] ;

        //Query to insert details into reservation table
        $query1="INSERT INTO reservation(res_no,Name,Mobile,Email,Count,time,table_no) VALUES('$res_no','$name','$mobile','$email','$count','$time','$table')";
        $data1=mysqli_query($conn,$query1);
            if($data1)
            {
                echo"<script> alert('Congratulation!! seat reserved')</script>";
            }else{
                die(mysqli_error($conn));
            }

            //Set table as taken
            $query2="UPDATE `reserved` SET `reserved`.`$time`=0 WHERE `reserved`.`table-no` = '$table'";
           $data2=mysqli_query($conn,$query2); 

            echo '<script>
                    window.location.href = "viewreservation.php";
                </script>';

   }
   } 
   
?>
<?php require '../partials/_navbar_footer.php'; ?>
<script>
    let viewReservations = document.getElementById('view-reser');
    viewReservations.onclick = function (){ //Redirect to view reservations page on clicking the button
        window.location.href = "viewreservation.php";
    }
</script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
-->
