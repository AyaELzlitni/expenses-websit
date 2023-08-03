<?php 
seesion_start();
if(!isset($_SESSION["user"])){
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Login Form</title>
    
<link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="container">
        <?phpif(isset($_POST["logn"]))
        {
            $username=$_POST["username"];
            $password=$_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE username='$username'";
            $result = mysqli_query($conn,$sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if($user)
            {
                if(password_verify($password , $user ["password"]))
                {
                    seesion_start();
                    $_SESSION["user"] = "yes";
                    header("Location: index.php");
                    die();
                }
            }else{
                echo "<div class='alert alert-danger'>password dose not match</div>";
            }
            else{
                echo "<div class='alert alert-danger'>username dose not match</div>";

            }
        }
        <form action="logn.php" method="POST">
            <div class ="form-group">
                <input type="username" placeholder="Enter username:" name="username" class="form-contorl">
</div>
              <div class ="form-group">
                <input type="password" placeholder="Enter password:" name="password" class="form-contorl">
</div>
<div class="form-btn">
    <input type="submit" value="Logn" name="logn" class="btn btn-primay">
</div>
</form>
</div>
</body>
</html>