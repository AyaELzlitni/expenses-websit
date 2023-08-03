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
               <li><a href=http://localhost/aa33a/login.php>login</a></li>
               <li><a href=http://localhost/aa33a/category.php>category</a></li>
            
             </ul>
        </nav>
    </header>

    <a href="add_transactions.php" class="btn border-secondary">Add transactions</a>
        <table class="table">
       <thead>
           <tr>
                <th scope="col">.N</th>
              <th scope="col">Amount</th>
              <th scope="col">previous Category</th>
               <th scope="col">Next Category</th>
               <th scope="col" >Date</th>
               <th scope="col" >comments</th>
          </tr>
      </thead>
      <tbody>
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

$sql = "SELECT id_transact, date, amount ,category_from,category_to,id,comments FROM transactions WHERE  id=$id  ";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    $id_transact=$row["id_transact"];
    $amount = $row["amount"];
    $category_from= $row["category_from"];
    $category_to = $row["category_to"];
    $date = $row["date"];
    $comments = $row["comments"];
  
    echo '<tr>
    <td>'.$id_transact.'</td>
    <td>'.$amount.'</td>
<td>'.$category_from.'</td>
<td>'.$category_to.'</td>
<td>'.$date.'</td>
<td>'.$comments.'</td>
<td >
</td>
</tr>';
}


} else
 {
  echo "<tr><td colspan='3'>لا توجد بيانات</td></tr>";
}


// إغلاق الاتصال بقاعدة البيانات
mysqli_close($conn);
?>
        </tbody>
       </table>
</body>
</html>