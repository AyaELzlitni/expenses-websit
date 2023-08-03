<?php
require_once 'dbConn.php';
session_start();
$id = $_SESSION['id'];
require_once 'dbConn.php';

$category_from = 'category1';
$category_to = 'category2';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $amount = $_POST["amount"];
    $comments = $_POST["comments"];
    $date = $_POST["date"];
    $category_from = $_POST["category_from"];
    $category_to = $_POST["category_to"];
  try {
      $mysqli->begin_transaction();

      $query ="UPDATE category SET Amount=Amount-$amount WHERE name_category='$category_from'";
      $stmt = $mysqli->query($query);

      $query ="UPDATE category SET Amount=Amount+$amount WHERE name_category='$category_to'";
      $stmt = $mysqli->query($query);

      $id = $_SESSION['id'];

      $date = date("Y-m-d H:i:s");
      $sql = "INSERT INTO transactions (date, amount, category_from, category_to, id, comments)
              VALUES ('$date', '$amount', '$category_from', '$category_to', '$id', '$comments')";
      if ($mysqli->query($sql) === TRUE) {
      header("Location: transactions.php");
      } else {
          echo "خطأ: " . $sql . "<br>" . $mysqli->error;
      }

      $mysqli->commit();

  } catch (mysqli_sql_exception $exception) {
      $mysqli->rollback();
      echo 'حدث خطأ أثناء نقل الأموال';

      if($mysqli!=null)
          $mysqli -> close();
      $mysqli=null;
      echo'<br>';
      echo $exception->getMessage();
  }
}
?>
// إغلاق اتصال قاعدة البيانات
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

  <h1>نظام تحويل الأموال</h1>
  <form method="post" >
    <label>Amount :</label>
    <input type="number" name="amount"><br>
        <label>previous Category  :</label>
    <input type="text" name="category_from"><br>
        <label>Next Category :</label>
    <input type="text" name="category_to"><br>
    <label>Date :</label>
    <input type="date" name="date"><br>
    <label> Reasons For The Transfer :</label>
    <textarea name="comments"></textarea><br>
    <button type="submit" class="btn border-secondary" name="submit"> ADD </button>
  </form>
</body>
</html>