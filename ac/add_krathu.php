<?php
require_once('../db/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   $secret = "6Lc88yUnAAAAAGygmdiQr8zBLnWRu3pGHewPW9WA";

   if (isset($_POST['g-recaptcha-response'])) {
      $captcha = $_POST['g-recaptcha-response'];
      $verifyResponse = file_get_contents('https://google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $captcha);
      $responseData = json_decode($verifyResponse);

      if (!$captcha) {
         header("Location: /" . "&c-err=1");
         exit();
      }

      $krathu_name = $_POST['krathu_name'];
      $details = $_POST['details'];
      $full_name = $_POST['full_name'];
      $id_card = $_POST['id_card'];

      $r = $c->createKrathu($krathu_name, $details, $full_name, $id_card);
      if ($r === true) {
         header("Location: /" . "&success=1");
         exit();
      } else {
         header("Location: /" . "&err=1");
         exit();
      }
   }
}
