<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>transact</title>
</head>

<body>

    <!-- Navbar -->
    <?php include 'navbar.php' ?>

    <!-- Connection to database -->
    <?php
    include 'dbconnect.php';

    ?>

    <div class="container-fluid">
        <div class="container text-center">

            <form action="transfer.php" class="py-5" method="POST" id="transfer">
                <div class="row px-5">
                    <div class="col-6">
                        <div>Transfer From</div>
                        <?php
                        $from_acc = $_POST['from'];
                        echo $from_acc;
                        ?>
                    </div>

                    <div class="col-6">
                        <label for="to_lst">Transfer To</label><br>
                        <select class="btn btn-secondary my-3 px-3" name="to_lst" id="to_lst" form="transfer">
                            <option value="" disabled hidden selected>Select receiver</option>
                            <?php
                            $sql = "SELECT * FROM customers";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $val = $row["accoun_no"];
                                    echo '<option value="' . $val . '">' . $row["account_no"] . ':' . $row["name"] . '</option>';
                            ?>
                            <?php
                                }
                            } else {
                                echo 'No customers.';
                            } ?>
                        </select>
                        <br>
                        <label for="to">Confirm Receiver</label><br>
                        <input type="text" name="to" id="to">
                    </div>
                </div>
                <div class="py-5">
                    <label for="amount">Transfer Amount</label><br>
                    <input type="number" id="amount" name="amount">
                </div>
                <button class="btn btn-primary" type="submit">
                    Make Transfer
                </button>
            </form>

        </div>
    </div>
</body>

</html>