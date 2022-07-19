<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">-->
<!--  <script src="https://kit.fontawesome.com/8de4607864.js" crossorigin="anonymous"></script>-->
<!---->
<!--    <link rel="stylesheet" href="../css/navbar.css">-->
<!--    <title>Navbar</title>-->
<!--</head>-->
<!--<body>-->
<?php
 echo '<nav class="navbar bg-dark navbar-main">
    <div class="container" id="container">

      <a class="navbar-brand" id="hamburger" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
          ☰
      </a>

        <li class="nav-item dropdown d-flex logout ml-auto">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Admin
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="#">Log Out</a></li>
            </ul>
        </li>
    </div>
  </nav>



  <div class="offcanvas offcanvas-start offcanvas-container" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">Lazeez Restaurant</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div>
<!--        Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.-->
        <ul class="offcanvas-body offcanvas-items">
          <li class="offcanvas-items-li"><a href="#" class="offcanvas-items-a"><i class="fa-solid fa-bowl-food"></i>Manage Menu</a></li>
          <li class="offcanvas-items-li"><a href="#" class="offcanvas-items-a"><i class="fa-solid fa-cubes-stacked"></i>Manage Stock</a></li>
          <li class="offcanvas-items-li"><a href="#" class="offcanvas-items-a"><i class="fa-solid fa-money-bill-1-wave"></i>Manage Transactions</a></li>
          <li class="offcanvas-items-li"><a href="#" class="offcanvas-items-a"><i class="fa-solid fa-headset"></i>Manage Reservations</a></li>
          <li class="offcanvas-items-li"><a href="#" class="offcanvas-items-a"><i class="fa-solid fa-chair"></i>Manage Table</a></li>
          <li class="offcanvas-items-li"><a href="#" class="offcanvas-items-a"><i class="fa-solid fa-user"></i>Manage Staff</a></li>
        </ul>
      </div>

    </div>
  </div>';
?>







<!--  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>-->
<!--  <script src="https://kit.fontawesome.com/8de4607864.js" crossorigin="anonymous"></script>-->
<!--</body>-->
<!--</html>-->