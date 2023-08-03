
<?php

$username = $_POST['username'];
$password = $_POST['password'];
$coofm = $_POST['coofm'];
$email= $_POST['email'];

 if(strlen($username)<10)
{
    die("The user should not be less than 10 characters");
}
else if(strlen($username)>15)
{
    die("The username should not exceed 15 characters");
}
if(strlen($password)<10)
{
    die("The password is requested to enter at least 10 characters");
}
elseif(strlen($password)>15)
{
     die("The password should not exceed 15 characters");
}
elseif(!preg_match("/[a-z]/",$password))
{
    die("It must consist of lowercase letters the password");
}
elseif(!preg_match("/[A-Z]/",$password))
{
    die("It is necessary for the password to include uppercase letters");
}
else if(!preg_match("/[~!@#$%^&*()_+]/",$password)){
    die("Password must contain romoz");
}
else if($coofm!==$coofm)
{
    die("Passwords do not match");
}


if (!isset($_POST['username']) ||  !isset($_POST['password']) 
     || !isset($_POST['coofm'])   || !isset($_POST['email']) ) 
      
      {
   echo "<p>You have not entered all the required details.<br />
         Please go back and try again.</p>";
   exit;
}

// create short variable names
$username=$_POST['username'];
$password=$_POST['password'];
$coofm=$_POST['coofm'];
$email=$_POST['email'];

//
require 'db_con.php';
if ($conn->connect_error) {
  echo "<p>Error: Could not connect to database.<br/>
  Please try again later.</p>";
    die($conn -> error);
}

$duplicate=mysqli_query($conn,"SELECT * FROM users WHERE username = '$username' OR email = '$email'");
if(mysqli_num_rows($duplicate) > 0){
    echo
     die("Username or Email no taken"); 
}
else{
    $query = "INSERT INTO users (username,password,email )  VALUES 
    ('$username', '$password', '$email' )" ;
       
    $result = $conn-> query($query);
    
    $sql="SELECT * FROM  users";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        $id = $conn->id;
        header("Location: login.php");
        exit;
    }
    else
    {
        echo $conn->error;
        echo "<br/>The item was not added.";
        echo "<br/>$query";
    }
}


   //close connection
   $conn -> close();
?>
?>