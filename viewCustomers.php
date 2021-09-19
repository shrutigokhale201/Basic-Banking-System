<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>View Customers</title>
</head>

<body background="photo.jpg" class="bg">
  <!-- Connection to database -->
  <?php
  include 'dbconnect.php';

  $sql = "SELECT * FROM customers";
  $result = $conn->query($sql);

  ?>

  <!-- Navbar -->
  <?php include 'navbar.php' ?>

  <!-- Table of customers -->
  <div class="container py-3">
    <table class="table table-dark table-striped table-hover">
      <thead>
        <tr>
          <th>Account Number</th>
          <th>Name</th>
          <th>e-mail</th>
          <th>Current Balance</th>
          <th>Function</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) { ?>
            <tr>
              <td><?php echo $row["account_no"]; ?></td>
              <td><?php echo $row["name"]; ?></td>
              <td><?php echo $row["email"]; ?></td>
              <td><?php echo "$" . $row["current_balance"]; ?></td>
              <td>
                <form action="transferMoney.php">
                  <a>
                    <button type="submit" class="btn btn-primary">
                      Transact
                    </button>
                  </a>
                </form>
              </td>
            </tr>
        <?php }
        } else {
          echo "0 results";
        }
        ?>
      </tbody>
    </table>
  </div>

</body>

</html>

<!--
$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}
-->
