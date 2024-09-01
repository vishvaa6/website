<?php 
    
    require 'data.php';
    if(!empty($_SESSION["id"])){
        $id = $_SESSION['id'];
        $result = mysqli_query($conn,"SELECT * FROM user WHERE id = '$id'");
        $row = mysqli_fetch_assoc($result);
    }
    else{
        header('Location:login.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>hello vishvaa</h1><br>
    <a href="login.php">Logout</a>

</body>
</html>