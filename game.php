<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
  <!-- init sql -->
  <?php
  include_once("config.php");
  session_start();
  // if not logged in, go to login page
  if(empty($_SESSION["id"])){header("location: login.html");}
  $user_id = $_SESSION["id"];
  $result = mysqli_query($mysqli, "SELECT u.unit_name, u.base_hp, u.base_att FROM user_unit JOIN units AS u ON user_unit.unit_id = u.unit_id WHERE user_id=$user_id");
  $unit_data = mysqli_fetch_array($result);
  $unit = "{ unit_name: '" . $unit_data["unit_name"] . 
          "', base_hp: " . $unit_data["base_hp"] . 
          ", base_att: " . $unit_data["base_att"] .
          "}";
  ?>
  <header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="index.html" class="nav-link px-2 link-body-emphasis">Home</a></li>
          <li><a href="game.php" class="nav-link px-2 link-body-emphasis">Game</a></li>
          <li><a href="shop.php" class="nav-link px-2 link-body-emphasis">Shop</a></li>
          <li><a href="about.html" class="nav-link px-2 link-body-emphasis">About Us</a></li>
          <li><a href="contact.php" class="nav-link px-2 link-body-emphasis">Contact Us</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>

        <div class="dropdown text-end">
          <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="profile_Image" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small">
            <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <main>
      <div class="row">
          <div class="col">
              <div class="card">
                  <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg>
                  <div class="card-body">
                    <h5 class="card-title">Easy Challenge</h5>
                    <p class="card-text">Challenge Description here.</p>
                    <button data-toggle="modal" data-target="#battle-window" class="btn btn-danger" onclick="battle(<?php echo $unit; ?>, 'easy')">Battle</button>
                  </div>
              </div>
          </div>
          <div class="col">
              <div class="card">
                  <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg>
                  <div class="card-body">
                    <h5 class="card-title">Hard Challenge</h5>
                    <p class="card-text">Challenge Description here.</p>
                    <button data-toggle="modal" data-target="#battle-window" class="btn btn-danger" onclick="battle(<?php echo $unit; ?>, 'hard')">Battle</button>
                  </div>
              </div>
          </div>
      </div>
  </main>
  <script src="battle.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>