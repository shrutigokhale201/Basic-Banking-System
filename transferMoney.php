<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money</title>
</head>

<body background="photo.jpg" class="bg">

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
                        <label for="from_lst"><b>Transfer From</b></label><br>
                        <select class="btn btn-secondary my-3 px-3" name="from_lst" id="from_lst" form="transfer">
                            <option value="" disabled hidden selected>Select sender</option>
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
                        <label for="from"><b>Confirm Sender</b></label><br>
                        <input type="text" name="from" id="from">
                    </div>

                    <div class="col-6">
                        <label for="to_lst"><b>Transfer To</b></label><br>
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
                        <label for="to"><b>Confirm Receiver</b></label><br>
                        <input type="text" name="to" id="to">
                    </div>
                </div>
                <div class="py-5">
                    <label for="amount"><b>Transfer Amount</b></label><br>
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
