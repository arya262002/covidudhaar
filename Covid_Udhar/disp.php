<?php
require('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <link rel="stylesheet" type="text/css" href="display.css">
</head>
<body>
    <div class="container">
        <h1>Enter your user id</h1>
        <form action="" method="post">
            <div class="input-group">
                <label for="username">User Id:</label>
                <input type="text" name="username" id="username">
            </div>
            <div class="button-group">
                <button type="submit" name="enter">Enter</button>
            </div>
        </form>
    </div>

    <div class="result-container">
        <div class="result-item">
            <label>Name:</label>
            <?php
            if (isset($_POST['enter'])) {
                $user = $_POST['username'];
                $query = "SELECT * FROM register WHERE username='$user'";
                $data = mysqli_query($con, $query);
                $total = mysqli_num_rows($data);

                if ($total > 0) {
                    $result = mysqli_fetch_assoc($data);
                    echo $result['name'];
                }
            }
            ?>
        </div>

        <div class="result-item">
            <label>Phone no:</label>
            <?php
            if (isset($_POST['enter'])) {
                $user = $_POST['username'];
                $query = "SELECT * FROM register WHERE username='$user'";
                $data = mysqli_query($con, $query);
                $total = mysqli_num_rows($data);

                if ($total > 0) {
                    $result = mysqli_fetch_assoc($data);
                    echo $result['phone'];
                }
            }
            ?>
        </div>

        <div class="result-item">
            <label>Addhar:</label>
            <?php
            if (isset($_POST['enter'])) {
                $user = $_POST['username'];
                $query = "SELECT * FROM register WHERE username='$user'";
                $data = mysqli_query($con, $query);
                $total = mysqli_num_rows($data);

                if ($total > 0) {
                    $result = mysqli_fetch_assoc($data);
                    echo $result['addhar'];
                }
            }
            ?>
        </div>

        <div class="result-item">
            <label>Remaining Balance:</label>
            <?php
            if (isset($_POST['enter'])) {
                $user = $_POST['username'];
                $query = "SELECT * FROM register WHERE username='$user'";
                $data = mysqli_query($con, $query);
                $total = mysqli_num_rows($data);

                if ($total > 0) {
                    $result = mysqli_fetch_assoc($data);
                    echo $result['amt'] - $result['paid'];
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
