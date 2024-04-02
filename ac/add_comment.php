<?php
require_once('../db/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   $krathu_id = $_POST['krathu_id'];
   $details = $_POST['details'];
   $full_name = $_POST['full_name'];
   $id_card = $_POST['id_card'];

   $r = $c->addComment($krathu_id, $details, $full_name, $id_card);
   if ($r === true) {
      header("Location: ../singleboard.php?krathuId=" . $krathu_id . "&success=1");
      exit();
   } else {
      echo "มีข้อผิดพลาดเกิดขึ้นในการตอบกลับกระทู้";
   }
}
