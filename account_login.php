<?php
include('config.php');
session_start();
$conn = dbConnection();

// Show Alert Message
if (isset($_SESSION['message'])) {
    echo "<script>alert('{$_SESSION['message']}');</script>";
    unset($_SESSION['message']);
}

// LOGIN SYSTEM
if (isset($_POST['submit'])) {

    $loginid = $_POST['prem'];  // User can enter phone or email
    $password = $_POST['password'];

    // $phone = $_POST['phone']; ye pahle ka code hai
    // $password = $_POST['password']; ye bhi pahle ka code hai

    // Check if loginid match phone or email
    $selectquery = "SELECT * FROM phoneandemail WHERE email = '$loginid' OR phone = '$loginid'";
    $res = mysqli_query($conn, $selectquery);

    if (mysqli_num_rows($res) > 0) {
        
        $row = mysqli_fetch_assoc($res);


        
        $hashed_password = $row['password'];

        // print_r($hashed_password);
        // exit;

        // Verify password
        if (password_verify($password, $hashed_password)) {
            $_SESSION['phone'] = $phone;
            header('Location: dashboard.php');
            exit;
        } else {
            echo "<script>alert('Incorrect password');</script>";
        }
    } else {
        echo "<script>alert('phone or email not found');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>This is a login form</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="container">
        <form method="post">
            <h1>Welcome to Travels</h1>
            
           <label>Email or Phone:</label>
            <input type="text" name="prem" placeholder="Enter Email or Phone" required>
            
           <label>Password:</label>
            <input type="password" name="password" placeholder="Enter Password" required>

            <button name="submit" type="submit">Login</button>
            <a href="create_account.php">Register</a>

        </form>
    </div>
</body>

</html>