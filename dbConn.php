<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expenses website";

// إنشاء اتصال بقاعدة البيانات
$mysqli = new mysqli($servername, $username, $password, $dbname);

// التحقق من وجود أي أخطاء في الاتصال
if ($mysqli->connect_error) {
    die("فشل الاتصال: " . $mysqli->connect_error);
}
?>