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
    <a href="Add_category.php" class="btn border-secondary">Add category</a>
        <table class="table">
       <thead>
           <tr>
                <th scope="col">.N</th>
              <th scope="col">Type</th>
              <th scope="col">Category</th>
               <th scope="col">Amount</th>
               <th scope="col" >Action</th>
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

// استعلام SQL لجلب البيانات الموجودة في جدول د
$sql = "SELECT id_category, Type, name_category, Amount ,id FROM category WHERE  id=$id  ";

// تنفيذ  وتخزين  في متغير
$result = mysqli_query($conn, $sql);

// عرض البيانات في جدول expenses
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    $id_category=$row["id_category"];
    $Type = $row["Type"];
    $name_category = $row["name_category"];
    $Amount = $row["Amount"];
  
    echo '<tr>
    <td>'.$id_category.'</td>
<td>'.$Type.'</td>
<td>'.$name_category.'</td>
<td>'.$Amount.'</td>
<td >
<a href="Add_exp.php?addexpid='.$id_category.'"class="btn border-danger">addexpenses</a>
       
<a href="delete.php?deleteid='.$id_category.'"class="btn border-danger">Delete</a>

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
      
       <a href="hombage.php"class="btn border-secondary">logout</a>
    </div>
</body>
</html>