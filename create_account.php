<?php
include 'config.php';
session_start();
$conn = dbConnection();


if (isset($_SESSION['message'])) {
    echo "<script>alert('{$_SESSION['message']}');</script>";
    unset($_SESSION['message']); // Clear message after showing
}

if (isset($_POST['submit'])) {

    $fname = $_POST['fname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password']; //3556566

    if ($password === $password) {

        $hash = password_hash($password, PASSWORD_BCRYPT);

        // CHECK IF EMAIL OR PHONE  ALREADY EXISTS
        $checkSql = "SELECT * FROM phoneandemail WHERE phone = '$phone' OR email = '$email'";
        $checkResult = mysqli_query($conn, $checkSql);

        if (mysqli_num_rows($checkResult) > 0) {
            $row = mysqli_fetch_assoc($checkResult);

            if ($row['phone'] == $phone) {
                $_SESSION['message'] = "Phone number already exists!";
            }

            if ($row['email'] == $email) {
                $_SESSION['message'] = "Email already exists!";
            }

            header("Location: create_account.php");
            exit;
        }

        $sql = "INSERT INTO phoneandemail (fname, phone, email, password)
                    VALUES ('$fname', '$phone', '$email', '$hash')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            $_SESSION['message'] = 'Registration Successful';

            header('location:create_account.php');
            exit;
        } else {
            $_SESSION['message'] = 'Registration Failed';
            header('Location: create_account.php');
            exit;
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>

    <form method="post">
        <div class="container">
            <h2>Registration Form</h2>

            <label>Full Name:</label>
            <input type="text" name="fname" placeholder="Enter your full name" required>


            <label>Phone Number:</label>
            <input type="text" name="phone" placeholder="Enter your phone number" required pattern="[0-9]{10}">


            <label>Email:</label>
            <input type="email" name="email" placeholder="Enter your email" required>

            <label>Password:</label>
            <input type="password" name="password" placeholder="Enter your password" required>

            <button type="submit" name="submit">Submit</button>
            <a href="account_login.php">Login</a>

        </div>
    </form>

</body>

</html>