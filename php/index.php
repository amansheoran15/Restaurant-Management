<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    require "../partials/_dbconnect.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $showError = false;

    $query = "SELECT * FROM USERS WHERE USERNAME = '$username' and PASSWORD = '$password'";
    $result = mysqli_query($conn , $query);
    $numRows = mysqli_num_rows($result);
    if($numRows==1){
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header('Location:menu.php');
    }else{
        $showError = "Incorrect Username or Password";
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>

<body>
<div id="container">
    <div id="login">
        <div id="admin-login">
            Administrator Login
        </div>
        <form action="/Project/php/index.php" method="post">
            <div class="mb-3 login-title">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 login-title">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <?php
                if($showError){
                    echo '<div class="alert alert-danger" role="alert">
                        Incorrect Username / Password
                    </div>';
                }
            ?>




            <button type="submit" class="btn btn-primary">Log In</button>
        </form>
    </div>
    <div id="img">
        <img src="../assets/resto-img.jpg" class="img-fluid" alt="...">
        <div class="centered">Mimi <br> Restaurant</div>
    </div>
</div>

<footer>
    <div id="copyright">
        Copyright &copy; 2022. All rights reserved;
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>