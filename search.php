
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
            <?php
        if(isset($_SESSION['id'])&& isset($_SESSION['username'])){?> 
           <font color="white"> <h2>&emsp;&emsp;  username: <?php echo $_SESSION['username']; ?></h2></font> 
            <?php } else{header("Location:homepage.php");  
             exit();  }
              ?> 
     
    
        <table class="table">
       <thead>
           <tr>
                <th scope="col">.N</th>
              <th scope="col">Category</th>
              <th scope="col">ID USER</th>
               <th scope="col">PRICE</th>
               <th scope="col" >DATE</th>
               <th scope="col">PAYMENT</th>
               <th scope="col">COMMENTS</th>
          </tr>
      </thead>
      <tbody>
  <h1>Search Expenses</h1>
  <form method="post">
    <label>Start Date:</label>
    <input type="date" name="start_Date"><br>
    <label>End Date:</label>
    <input type="date" name="end_Date"><br>
    <button type="submit" name="submit">Search</button>
  </form>
</body>
</html>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $start_Date = $_POST['start_Date'];
  $end_Date = $_POST['end_Date'];

  if ($start_Date && $end_Date) {
    $conn = new mysqli('localhost', 'root', '', 'expenses website');
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }


    $id = $_SESSION['id'];

    $query = "SELECT id_exp, id_category, id, price, Date, payment, comment FROM expenses WHERE id = ? AND Date BETWEEN ? AND ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('iss', $id, $start_Date, $end_Date);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $id_exp = $row["id_exp"];
        $id_category=$row["id_category"];
        $id = $row["id"];
        $price = $row["price"];
        $Date = $row["Date"];
        $payment = $row["payment"];
        $comment = $row["comment"];
      
        echo '<tr>
        <td>'.$id_exp.'</td>
        <td>'.$id_category.'</td>
        <td>'.$id.'</td>
    <td>'.$price.'</td>
    <td>'.$Date.'</td>
    <td>'.$payment.'</td>
    <td>'.$comment.'</td>
    </tr>';
    }
    
    $stmt->close();
    $conn->close();
  } else {
    echo "Invalid input";
  }
}
?>