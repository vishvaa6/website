<?php 
require "data.php";
if(isset($_POST["submit"])){
$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM user WHERE username = '$username' OR email = '$username'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);


if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
        $_SESSION["login"] = true;
        $_SESSION["id"] = $row["id"];
        header("Location: good.php");
    }
    else{
    echo "<script> alert('invalid password'); </script>";
    }
}
else{
    echo "<script> alert('user not registered'); </script>";

}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VISHVAA</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="php.css">
</head>
<body class="oooo">
    <form action ="login.php" method ="post">
        <h1>Login</h1>
        <label>username</label>
        <input type="text" id="username" name="username">
        <label>password</label>
        <input type="password" id="password" name="password">
        <div>
            <a class="one" href="signup.php">SignUp?</a>
            <a class="two" href="forgot pass.html">Forgot Password?</a>
        </div>
        <button name="submit">Login</button>
    </form>
</body>
</html>