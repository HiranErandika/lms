<?php
   define('DB_SERVER', 'localhost:3306');
   define('DB_USERNAME', 'root');
   define('DB_DATABASE', 'lms');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,"",DB_DATABASE);
?>
