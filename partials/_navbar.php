
<?php

//Navbar Body

echo '<nav class="navbar navbar-main">
    <div class="container" id="container">

      <a class="navbar-brand" id="hamburger" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
          ☰
      </a>
      <a class="navbar-brand d-flex logout" id="hamburger" data-bs-toggle="offcanvas" href="../partials/_logout.php" role="button" aria-controls="offcanvasExample">
          <img src="../assets/logout.svg" width="50">
      </a>
    </div>
  </nav>


   <!-- Navbar Menu Using Offcanvas -->
  <div class="offcanvas offcanvas-start offcanvas-container" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="resto-title"><img src="../assets/logo-white.png" width="50">Mimi Restaurant</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div>
<!--        Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.-->
        <ul class="offcanvas-body offcanvas-items">
          <a href="../php/menu.php" class="offcanvas-items-a"><li class="offcanvas-items-li"><i class="fa-solid fa-bowl-food"></i>Manage Menu</li></a>
          <a href="../php/stockcontrol.php" class="offcanvas-items-a"><li class="offcanvas-items-li"><i class="fa-solid fa-cubes-stacked"></i>Manage Stock</li></a>
          <a href="../php/transaction.php" class="offcanvas-items-a"><li class="offcanvas-items-li"><i class="fa-solid fa-money-bill-1-wave"></i>Manage Transactions</li></a>
          <a href="../php/reservation.php" class="offcanvas-items-a"><li class="offcanvas-items-li"><i class="fa-solid fa-headset"></i>Manage Reservations</li></a>
          <a href="../php/table.php" class="offcanvas-items-a"><li class="offcanvas-items-li"><i class="fa-solid fa-chair"></i>Manage Table</li></a>
          <a href="../php/employeeDetails.php" class="offcanvas-items-a"><li class="offcanvas-items-li"><i class="fa-solid fa-user"></i>Manage Staff</li></a>
        </ul>
      </div>

    </div>
  </div>';
?>
