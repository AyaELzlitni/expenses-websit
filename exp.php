<?php
session_start();

if(!isset($_SESSION['id']) || !isset($_SESSION['username'])){
  header("Location:homepage.php");
  exit();
}

$id = $_SESSION['id'];

$conn = new mysqli('localhost', 'root', '', 'expenses website');
if($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM expenses WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();

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
       <a href="Add_exp.php" class="btn border-secondary">ADD Expenses</a>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">Date</th>
            <th scope="col">Payment</th>
            <th scope="col">Comment</th>
            <th scope="col" >Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            while($row = $result->fetch_assoc())
             {
              echo "<tr>";
              echo "<td>" . $row['id_category'] . "</td>";
              echo "<td>" . $row['price'] . "</td>";
              echo "<td>" . $row['Date'] . "</td>";
              echo "<td>" . $row['payment'] . "</td>";
              echo "<td>" . $row['comment'] . "</td>";
              echo "<td><a href='delete.php?id=" . $row['id_exp'] . "' class='btn btn-danger'>Delete</a></td>";
              echo "<td><a href='update.php?id=" . $row['id_exp'] . "' class='btn btn-danger'>update</a></td>";
              echo "</tr>";
            }
          ?>
        </tbody>
      </table>
      
    </div>
  </div>
</body>
</html>