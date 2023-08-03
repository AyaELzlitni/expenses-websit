<?php 
 session_start();
 include 'db_con.php'; 
  
if(isset($_POST['username']) && isset($_POST['password']))
{
     function validate($data) 
     { 
        $data=trim( $data); 
        $data=stripslashes( $data); 
        $data= htmlspecialchars( $data); 
        return  $data; 
     } 
     // 
    $username=validate($_POST['username']) ; 
    $password=validate ($_POST['password']); 
    if(empty($username)){
       header("Location: login.php?error= username error"); 
       exit(); 
    } 
    else if(empty($password))
    { 
      header("Location: login.php?error= password error");  
      exit(); 
    } 
    else 
    { 
      $conn = mysqli_connect('localhost','root' , '' ,'expenses website');
     // 
       $sql = "SELECT * FROM users WHERE username='$username' and password='$password'"; 
       $result = mysqli_query( $conn,$sql); 
          
       
        if(mysqli_num_rows($result) === 1) 
         { 
          $row= mysqli_fetch_assoc($result); 
          if( $row['username']===$username && $row['password']===$password) 
          { 
            $_SESSION['username']=$row['username']; 
            $_SESSION['id']=$row['id']; 
            echo"welcom"; 
           
            header("Location: homepage.php");  
             exit();      
          }  
          else{header("Location:login.php");  exit();}
        } 
        else{header("Location:login.php");  exit();}
 
      } 
    }       
    
   else{  header("Location:login.php");  exit(); }
    
?>