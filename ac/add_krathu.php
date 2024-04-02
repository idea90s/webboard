<?php
require_once('../db/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   $krathu_name = $_POST['krathu_name'];
   $details = $_POST['details'];
   $full_name = $_POST['full_name'];
   $id_card = $_POST['id_card'];

   $r = $c->createKrathu($krathu_name, $details, $full_name, $id_card);
   if ($r === true) {
      header("Location: /");
      exit();
   } else {
      echo "มีข้อผิดพลาดเกิดขึ้นในการสร้างกระทู้";
   }
}
