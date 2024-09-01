<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href=" ">
</head>
<body>
    <div class="call">
        <div class="time-display" id="current-time"></div>
        
        <form action="login.php" method="post">
            <h1><u>Anonymous</u> Login</h1>
            <div class="hju">
            <div class="dot">
                <i class='bx bxs-user'></i>
                <input placeholder="Username" type="text" required name="username">
            </div>
            <div class="dot">
                <i class='bx bxs-lock'></i>
                <input placeholder="Password" class="pass" type="password" required name="password">
            </div>
            <div class="button">
                <input class="sub" type="submit" name="login" value="Login">
            </div>
            </div>
        </form>
    </div>
    <p>v 0.0.1</p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', second: '2-digit' });
            document.getElementById('current-time').textContent = timeString;
        }

        setInterval(updateTime, 1000);
        updateTime();
    </script>
</body>
</html>



<?php
session_start();

require 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];


    // Prepare and execute SQL query
    $sql = "SELECT * FROM anochat WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn,$sql);
    $row =mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($password == $row['password']){
        
            header("Location: index.php");
        }
        else{
            echo "<script> alert('password invalid')'; </script>";
        }
    }
    else{
        echo "<script> alert('invalid username and password'); </script>";
    }
}
$conn->close();
?>
