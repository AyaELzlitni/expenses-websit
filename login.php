<?php 
session_start();   
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <link rel="stylesheet" href="login.css">
    <link rel="icon" href="images/Finance-amico (1).png">
    <link rel="stylesheet" type="text/php" href="homepage.php">

    <title>Login</title>
</head>
<body>
<header>
     <hr>
     <nav id="navbar">

      <img id="logo" src="images/logo.png" >

              <h1 class ="logo">Expenses Tracking</h1>
             <ul class="navcontent">
               <li><a href="homepage.php">HomePage</a></li>
               <li><a href="siginup.php">Sign UP</a></li>
               <li><a href="login.php ">login 
                 </a></li>
       
             </ul>
        </nav>
        <div id="main">
        <div class="box">
        <form method="POST" action="loginnm.php" method="post">

            <h2>Sign In</h2>
            <div class="inputBox">
                <span name="username">Username</span>  
                 <input type="username" name="username" placeholder="username">
                  <i></i>
                   </div>
                    <div class="inputBox">
                      <span>Enter Password</span>
                  <input type="password" name="password"placeholder="password">
                  <i></i>
                  </div>
                  
                   <br> <button type ="submit">login</button>
                        <div class="links">
                  <a href="homepage.php">Forgot Password? </a>
                 
                  <a href="siginup.php">SignUp</a>
                  
                 </div> 
              </form>
    
         <a herf="logout.php" class="btn btn-warning">Logout</a>
 
             <div><p> Not registerd yet <a herf="siginup.php">siginup </a></p></div>        
         <footer>Copyright © 2022-2023 .
  All Rights are reserved</footer>
        
</body>
</html>