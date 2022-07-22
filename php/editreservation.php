<?php
require '../partials/_dbconnect.php';
$nm=$_GET['name'];
$mn=$_GET['mobile'];
$em=$_GET['email'];
$c=$_GET['count'];
$t=$_GET['time'];
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
<div class="reservation">
<div class="heading d-flex justify-content-center my-3">
    <h3>Edit Reservation</h3>
</div> 
    <form action="#" method="POST">
    <div class="form-group">
                <div class="row d-flex justify-content-evenly mb-3">
                <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                <label for="name">Name:</label>
                </div>
                <div class="col-9">
                <input type="text" name="Name" value="<?php echo "$nm";?>"class="form-control" id="name" placeholder="Name">
                </div>    
                </div>
                <div class="row d-flex justify-content-evenly my-3">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                <label for="phone">Mobile Number:</label>
                </div>
                <div class="col-9">
                <input type="text" name="mobile" value="<?php echo "$mn";?>"class="form-control" id="mobile" placeholder="Mobile Number">
                </div>    
                </div>
                <div class="row d-flex justify-content-evenly my-3">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                <label for="exampleInputEmail1">Email address</label>
                </div>
                <div class="col-9">
                <input type="email" name="Email" value="<?php echo "$em";?>"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">    
                </div>    
                </div>
                <div class="row d-flex justify-content-evenly my-3">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                <label for="inlineFormCustomSelectPref" class="form-label">How many?: </label>
                </div>
                <div class="col-9">
                <select class="form-select" name= "Count" id="inlineFormCustomSelectPref">
                    <option selected disabled>Number of people</option>
                    <option value="1"<?php if($c=='1') echo "selected";?>>One</option>
                    <option value="2"<?php if($c=='2') echo "selected";?>>Two</option>
                    <option value="3"<?php if($c=='3') echo "selected";?>>Three</option>
                    <option value="4"<?php if($c=='4') echo "selected";?>>Four</option>
                    <option value="5"<?php if($c=='5') echo "selected";?>>Five</option>
                </select>  
                </div>    
                </div>
                <!--<div class="row d-flex justify-content-evenly my-3">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                <label for="date" class="form-label">Select Date: </label>
                </div>
                <div class="col-9">
                <input type="date" name ="Date" id="dateNTime" class="form-control"  placeholder="Date" >
            </div>
            </div>-->
            <div class="row d-flex justify-content-evenly my-3">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
               <label for="slots" class="form-label mt-1">Select time Slot: </label>
               </div>
                <div class="col-9">
                <select class="form-select" name="Time" id="inlineFormCustomSelectPref">
                    <option selected disabled>Time slot</option>
                    <option value="7" <?php if($t=='7:00') echo "selected";?>>7:00-7:50 </option>
                    <option value="8"<?php if($t=='8:00') echo "selected";?>>8:00-8:50</option>
                    <option value="9"<?php if($t=='9:00') echo "selected";?>>9:00-9:50</option>
                </select>   
               </div>
            </div>
            <div class="d-flex justify-content-center mb-3">
                <input type ="submit" id="reserveBtn" name="Update" placeholder="Update" value="Update">
            </div>
    </div>
    <div class="form-group">
        </form>
    </div>
</div>    
<?php
    if($_POST['Update'])
       {
         $res_no=$_POST['res_no'];
         $name  =$_POST['Name'];
         $mobile = $_POST['mobile'];
         $email = $_POST['Email'];
         $count = $_POST['Count'];
         //$date  = $_GET['Date'];
         $time  =$_POST['Time'];
         $query="UPDATE reservation SET `Name`='$name',`Mobile` = '$mobile',`Email`='$email', `Count`= '$count',`time`='$time' WHERE `res_no`='$res_no'";
         $data=mysqli_query($conn,$query); 
         if($data)
            {
              echo"<script> alert('Reservation edited')</script>";
              ?>
              <meta http-equiv="refresh" 
              content="1; url = viewreservation.php" />
              <?php
            }
         }
?>
<?php require '../partials/_navbar_footer.php'; ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
