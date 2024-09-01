<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="signup.css">
</head>
<body>
<form action="signup.php" method="post">
        <h1>Signup</h1>
        <label>username</label>
        <input type="text" name="username" id="username">
        <label>email</label>
        <input type="text" name="email" id="email">
        <label>password</label>
        <input type="password" name="password" id="password">
        <div><P>already a member<a class="three" href="login.php">Login?</a></P></div>
        
        <button name="signup" >Signup</button>
    </form>
</body>
</html>
<?php 
    require 'data.php';
    if(!empty($_SESSION["id"])){
        header("Location: good.php");
     }
     if(isset($_POST["signup"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $sql =  "SELECT * FROM user WHERE username = '$username' OR email = '$email'";
        $colu = mysqli_query($conn,$sql);
        
        if(mysqli_num_rows($colu) > 0){
            echo "<script>alert('username or email is alerady taken try another one'); </script>";
        }
        else{
            $querry = "INSERT INTO user VALUES('','$username','$email','$password')";
            mysqli_query($conn,$querry);
            echo "<script> alert('regestration successful'); </script>";
        }

        


    }


?>