<?php
session_start();
?>
<?php


$id = $_SESSION['id'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expenses website";
$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit'])) {
    
    $Type = $_POST['Type'];
    $Amount = $_POST['Amount'];
    $name_category = $_POST['name_category'];

   
    $sql = "INSERT INTO category (Type, name_category, Amount, id) VALUES ('$Type', '$name_category', '$Amount', '$id')";
    
    if (mysqli_query($conn, $sql)) {
       
        header("Location: category.php");
        exit();
    } else {
        echo "حدث خطأ أثناء إضافة المصروف: " . mysqli_error($conn);
    }
}


mysqli_close($conn);
?>
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
         
        if(isset($_SESSION['id'])&& isset($_SESSION['username'])){?> 
           <font color="black"> <h2>&emsp;&emsp; *USER : <?php echo $_SESSION['username']; ?></h2></font> 
            <?php } else{header("Location:homepage.php");  
             exit();  }
              ?>
               <li><a href="homepage.php">HomePage</a></li>
               <li><a href="http://localhost/aa33a/siginup.php">Sign UP</a></li>
               <li><a href=http://localhost/aa33a/login.php>login</a></li>
               <li><a href=http://localhost/aa33a/category.php>category</a></li>
            
             </ul>
        </nav>
    </header>

       <div class="form-group">
       <label >TYPE :</label>
       <select name="Type"  class="form-control" >
                  <option value="Income">Income</option>
                  <option value="Expense">Expense</option>
               </select>
      </div>
     <div class="form-group">
     <label >Category :</label>
     <select name="name_category"  class="form-control" >
                  <option value="Food">Food</option>
                  <option value="Sports">Sports</option>
                  <option value="Shopping">Shopping</option>
                  <option value="Transport">Transport</option>
                  <option value="Bills">Bills</option>
               </select>
     </div>   
      
      <div class="form-group">
         <label >Amount</label>
         <input type="number" class="form-control"placeholder="Enter your Amount" name="Amount" autocomplete="off">
     </div> 
    
      <button type="submit" class="btn btn-primary" name="submit"> ADD </button>
     </from>
  </div>
</body>
</html>