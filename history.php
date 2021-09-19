<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
</head>

<body background="photo.png" class="bg">
    <!-- Connection to database -->
    <?php
    include 'dbconnect.php';

    $sql = "SELECT * FROM transaction_history";
    $result = $conn->query($sql);

    ?>

    <!-- Navbar -->
    <?php include 'navbar.php' ?>

    <!-- Table of customers -->
    <div class="container py-3">
        <table class="table table-dark table-striped table-hover">
            <thead>
                <tr>
                    <th>Transaction Id</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Amount</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["from_acc"] . " : " . $row["from_name"]; ?></td>
                            <td><?php echo $row["to_acc"] . " : " . $row["to_name"]; ?></td>
                            <td><?php echo "$" . $row["amount"]; ?></td>
                            <td><?php echo $row["time_of_transaction"]; ?></td>
                        </tr>
                <?php }
                } else {
                    echo "No transactions yet.";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>
