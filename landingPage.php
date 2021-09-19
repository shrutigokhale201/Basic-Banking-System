<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css">
  <title>Transaction Bank</title>
</head>

<body background="new.png" class="bg">
  <!-- Navbar -->
  <?php include 'navbar.php' ?>

  <div class="">

    <div class="">
      <!-- Heading -->
      <div class="container text-center py-3">
        <h3 class="display-5">Welcome to</h3>
        <h1 class="display-2">Transaction Bank</h1>
      </div>

      <!-- Buttons -->
      <div class="container py-5">
        <div class="row text-center">
          <div class="col-4 h-100">
            <a href="viewCustomers.php">
              <button class="btn btn-dark py-5 px-5"><span class="h1">View<br>Customers</span></button>
            </a>
          </div>
          <div class="col-4 h-100">
            <a href="transferMoney.php">
              <button class="btn btn-dark py-5 px-5"><span class="h1">Transfer<br>Money</span></button>
            </a>
          </div>
          <div class="col-4 h-100">
            <a href="history.php">
              <button class="btn btn-dark py-5 px-5"><span class="h1">Transaction<br>History</span></button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>