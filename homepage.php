
<!DOCTYPE html>
<html lang="en">
<head>
     <TItle>AYA ELZLITNI </TItle>
    <link rel="stylesheet" type="text/css" href="homepage.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    <header>
     <hr>
     <nav id="navbar">
          <img id="logo" src="images/logo.png" >
              <h1 class ="logo">Expenses Tracking</h1>
             <ul class="navcontent">
             <?php
          session_start(); 
        if(isset($_SESSION['id'])&& isset($_SESSION['username'])){?> 
           <font color="black"> <h2>&emsp;&emsp; *USER : <?php echo $_SESSION['username']; ?></h2></font> 
            <?php } else{header("Location:homepage.php");  
             exit();  }
              ?>
               <li><a href="homepage.php">HomePage</a></li>
               <li><a href="http://localhost/aa33a/siginup.php">Sign UP</a></li>
               <li><a href="http://localhost/aa33a/exp.php">exp</a></li>
               <li><a href=http://localhost/aa33a/login.php>login</a></li>
               <li><a href=http://localhost/aa33a/category.php>category</a></li>
               <li><a herf ="logout.php" >logout</a></li>

            
             </ul>
        </nav>
    </header>
    <div id="main">
      <div class="contents">
        <h3>Hi,I'm <span>AYA</span> </h3>
         <h1><em> money management <span>W</span>ebsite</em></h1>
          <h3>Money management is an important aspect of life that is often overlooked,<br> but plays a vital role in achieving financial stability and security. Whether you are an individual, a business owner, <br>or managing a family's finances, having a well-thought-out money management plan can make all the difference between success and failure.<be> In this blog post,  and its benefits to your financial health<be>Money in all its forms, from coins to checks, remains the most important and necessary component of any business. Therefore, managers must understand all the financial aspects related to their production operations, and the way accountants describe these financial methods.
        </h3> 

        <form method="POST" action="loginmpp.php" method="post">


 
         <a href ="siginup.php">Sign UP</a>
                  <a href="login.php">Log In</a>
                  <a href="category.php">category </a>
                   <a href="Add_category.php">Add_category </a>
                   <a href="http://localhost/aa33a/exp.php">exp </a>
                   <a href="Add_exp.php">Add_exp </a>
                   <a href="transactions.php">transactions</a>
                   <a href="add_transactions.php">add_transactions</a>
                   <a href="rating.php">rating.</a>
                   <a href="search.php">search</a>
    

                  <div class="social-icon">
                    <ul>
                       <h3><em>"social media sites"</em></h3> 
                        <li><i class='bx bxl-facebook-circle' style='color:rgba(3,10,67,0.91)'></i></li>
                        <li><i class='bx bxl-instagram-alt' style='color:rgba(3,10,67,0.91)' ></i></li>
                         <li ><i class='bx bxl-twitter' style='color:rgba(3,10,67,0.91)' ></i></li>
                         <li><i class='bx bxl-linkedin-square' style='color:rgba(3,10,67,0.91)' ></i></li>
                   </ul> 
              </div>
        </div>

        <div class="sidebar">    
          <ul>
            <li><a href="#">Create an account</a></li>
               <li><a href="#">sign in</a></li>
              <li><a href="#">Classification of expenses</a></li>
              <li><a href="#">Add expenses</a></li>
              <li><a href="#">research</a></li>
              <li><a href="#">reports</a></li>
              <li><a href="#">Edit expenses</a></li>
              <li><a href="#">statistics</a></li>
              <li><a href="#">money transfer</a></li>
              <li><a href="#">Evaluate a website</a></li>
   
           </ul>
         </div>
     </div>


<footer>Copyright © 2022-2023 .
  All Rights are reserved</footer>
</body>
</html>