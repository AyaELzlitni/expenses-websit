<?php
session_start();

require_once 'dbConn.php';

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $query = "SELECT rated FROM users WHERE id = '$id'";
    $result = $mysqli->query($query);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['rated'] == 1) {
            echo "لقد قيمت الموقع من قبل";
        } else {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $rating = $_POST["rating"];
                $comment = $_POST["comment"];

                try {
                    $mysqli->begin_transaction();

                    $sql = "INSERT INTO ratings (id, rating, comment) VALUES ('$id', '$rating', '$comment')";
                    if ($mysqli->query($sql) === TRUE) {
                        echo "تم تسجيل التقييم بنجاح";
                    } else {
                        echo "خطأ: " . $sql . "<br>" . $mysqli->error;
                    }

                    $query = "UPDATE users SET rated = 1 WHERE id = '$id'";
                    $mysqli->query($query);

                    $mysqli->commit();

                } catch (mysqli_sql_exception $exception) {
                    $mysqli->rollback();
                    echo 'حدث خطأ أثناء تسجيل التقييم';

                    if($mysqli!=null)
                        $mysqli -> close();
                    $mysqli=null;
                    echo'<br>';
                    echo $exception->getMessage();
                }
            }
        }
    } else {
        echo "يجب تسجيل الدخول لتقييم الموقع";
    }
} else {
    echo "يجب تسجيل الدخول لتقييم الموقع";
}
$mysqli->close();
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
<h2>تقييم الموقع</h2>
<form method="post">
  <label for="rating">التقييم:</label>
  <select id="rating" name="rating">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
  </select>
  <br><br>
  <label for="comment">تعليق:</label>
  <textarea id="comment" name="comment"></textarea>
  <br><br>
  <input type="submit" name="submit" value="تقييم">
</form>
</body>
</html>