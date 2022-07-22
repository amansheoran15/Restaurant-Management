<?php
require '../partials/_dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/editEmployeeStyle.css">


</head>
<body>
   
    <div class="editEmployee">
        <div class="heading d-flex justify-content-center my-4">
            <h3>Add New Employee</h3>
        </div> 
        <form action="#" method="POST">
            <div class="form-group">
                <div class="row d-flex justify-content-evenly mb-3">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                        <label for="exampleInputEmail1">Name</label>
                    </div>
                    <div class="col-9">
                        <input type="text" name="name" class="form-control" id="name"  placeholder="Enter Name">
                    </div>    
                </div>
                <div class="row d-flex justify-content-evenly mb-3">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                        <label for="exampleInputEmail1">Emp Id</label>
                    </div>
                    <div class="col-9">
                        <input type="text" name="empid" class="form-control" id="empid"  placeholder="Enter employee id">
                    </div>    
                </div>
                <div class="row d-flex justify-content-evenly my-3">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                        <label for="exampleInputEmail1">Designation</label>
                    </div>
                    <div class="col-9">
                        <input type="text" name="desig" class="form-control" id="designation"  placeholder="Enter designation">
                    </div>    
                </div>
                <div class="row d-flex justify-content-evenly my-3">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                        <label for="exampleInputEmail1">Email address</label>
                    </div>
                    <div class="col-9">
                        <input type="email" name="email" class="form-control" id="email"  placeholder="Enter address">
                    </div>    
                </div>
                <div class="row d-flex justify-content-evenly my-3">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                        <label for="exampleInputEmail1">Salary</label>
                    </div>
                    <div class="col-9">
                        <input type="text" name="sal" class="form-control" id="salary"  placeholder="Enter salary">
                    </div>    
                </div>
                <div class="row d-flex justify-content-evenly my-3">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                        <label for="exampleInputEmail1">Phone Number</label>
                    </div>
                    <div class="col-9">
                        <input type="text" name="phone" class="form-control" id="phone"  placeholder="Enter ph. number">
                    </div>    
                </div>
                <div class="row d-flex justify-content-evenly my-3">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                        <label for="date" class="form-label">Date of Joining</label>
                    </div>
                    <div class="col-9">
                        <input type="date" name="doj" id="joinDate" class="form-control"  placeholder="Date">
                    </div>    
                </div>
                <div class="row d-flex justify-content-evenly mt-5 mb-3">
                    <div class="col-2 d-flex align-items-center" style="font-size: 1.3rem;">
                        <label for="exampleInputEmail1">Availability</label>
                    </div>
                    <div class="col-9">
                        <input class="form-check-input" type="radio" name="avail" id="availability" value="y" checked>
                        <label class="form-check-label" for="availability">Yes</label>
                        <input class="form-check-input ml-4" type="radio" name="avail" id="availability" value="n">
                        <label class="form-check-label" for="availability">No</label>
                    </div>   
                </div>
                <div class="d-flex justify-content-center mb-3">
                <input type ="submit" id="submitBtn" name="submit"  placeholder="Submit"value="submit">
                </div>
            </div>
        </form>
        </div>
    </div>
 <?php
 if(isset($_POST['submit']))
{
   $name  = $_POST['name'];
   $empid = $_POST['empid'];
   $desig = $_POST['desig'];
   $sal   =$_POST['sal'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $doj  = $_POST['doj'];
   $avail =$_POST['avail'];
   $query="INSERT INTO employee(name,empid,designation,salary,phone,email,doj,availability) 
   VALUES('$name','$empid','$desig','$sal','$phone','$email','$doj','1')";
   $data=mysqli_query($conn,$query);
   if($data)
    {
        echo"<script> alert('Record added ')</script>";
     ?>
         <meta http-equiv="refresh" 
          content="1; url = employeeDetails.php" />
     <?php
    }else{
       echo mysqli_error($conn);
   }
}
?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>