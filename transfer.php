<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>transfer</title>
</head>

<body background="photo.jpg" class="bg">
    <?php
    include 'navbar.php';
    include 'dbconnect.php';

    $from_acc = $_POST['from'];
    $to_acc = $_POST['to'];
    $amount = $_POST['amount'];

    // echo $from_acc;
    // echo $to_acc;
    // echo "$" . $amount;

    /* Checking if enough balance */
    $sql = "SELECT * FROM customers WHERE account_no = '" . $from_acc . "' ";
    $result = $conn->query($sql);
    $sender = $result->fetch_assoc();
    //echo $sender['current_balance'];
    $sql = "SELECT * FROM customers WHERE account_no = '" . $to_acc . "' ";
    $result = $conn->query($sql);
    $receiver = $result->fetch_assoc();

    if ($amount > $sender['current_balance']) {
        echo '<h1 class="text-center pt-5">INSUFFICIENT BALANCE.
        <span class="text-danger"> TRANSACTION FAILED</span>.</h1>';
        echo '<h1 class="text-center pt-5"><a href="transferMoney.php">New Transaction</a></h1>';
    } else {
        //UPDATE STATEMENTS
        $new_sender = $sender['current_balance'] - $amount;
        $new_receiver = $receiver['current_balance'] + $amount;
        $sql = "UPDATE customers SET current_balance=$new_sender WHERE account_no = '" . $from_acc . "' ";
        $result = $conn->query($sql);
        $sql = "UPDATE customers SET current_balance=$new_receiver WHERE account_no = '" . $to_acc . "' ";
        $result = $conn->query($sql);
        //Record Transaction
        $sname = $sender["name"];
        $rname = $receiver["name"];
        $sql = "INSERT INTO transaction_history (from_acc,to_acc,amount,from_name,to_name)
        VALUES ('$from_acc','$to_acc',$amount,'$sname','$rname')";
        $result = $conn->query($sql);
        //Success message
        echo '<h1 class="text-center pt-5 text-success">TRANSACTION SUCCESSFUL</h1>';
        echo '<div class="text-center">
        <a href="landingPage.php"><button class="btn btn-dark my-5 py-2 px-5 mx-5">Home</button></a>
        <a href="transferMoney.php"><button class="btn btn-dark my-5 py-2 px-5 mx-5">New Transaction</button></a></div>';
        echo '';
    }
    ?>
</body>

</html>
