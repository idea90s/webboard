<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webboard";

try {
   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
   // set the PDO error mode to exception
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo 'working';
} catch (PDOException $e) {
   echo "Connection failed: " . $e->getMessage();
}

require_once('controllers.php');
$c = new Controll($conn);
