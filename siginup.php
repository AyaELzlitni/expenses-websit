<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="siginup.css">
    <link rel="stylesheet" type="text/php" href="sigup.php">
    <title>Sign UP</title>
    </head>
<body>
  <header>
    <hr>
    <nav id="navbar">

    <img id="logo" src="images/logo.png" >

             <h1 class ="logo">Expenses Tracking</h1>

            <ul class="navcontent">
              <li><a href ="homepage.php">HomePage</a></li>
              <li><a href="siginup.php">Sign UP</a></li>
              <li><a href="login.php ">login</a></li>
       
            </ul>
       </nav>
       <div id="main">
      <div class="box">
         <span class="boxline"></span>
         <form method="POST" action="sigup.php" method="post">
         <h2>Sign Up</h2>
            <div class="inputBox">
              <span name="username">username</span>  
                <input type="text" name="username"placeholder="username" required>

                <i></i>
            </div>
            <div class="inputBox">
              <input type="password" name="password" placeholder="password" required >
              <span> password </span>


              <i></i>
            </div>
             
            
          <div class="inputBox">
            <input type="password" name="coofm" placeholder="coofm" required>
            <span name="coofm "> coofm</span>


             <i></i>
        </div>

        <div class="inputBox">
          <input type="email" name="email"placeholder="email" required >
          <span> Email Address</span>

          <i></i>
         </div>
      
         <input type="submit" value="Sign Up" >

                
                        <div class="links">
                  <a href="homepage.php">Forgot Password? </a>
                 
                  <a href="loginphp">login</a>
                  
                 </div> 
             
        </form>
      </div>
      <footer>Copyright © 2022-2023 .
  All Rights are reserved</footer>
</body>
</html>