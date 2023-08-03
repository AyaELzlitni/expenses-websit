<?php
session_start();
session_destroy();
hrader("Location: login.php");
?>