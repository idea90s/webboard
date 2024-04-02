<?php
require_once('./db/db.php');

if (isset($_GET['krathuId'])) {
   $krathu_id = $_GET['krathuId'];
   $krathu = $c->getKrathu($krathu_id);

   $comments = $c->getComments($krathu_id);
   // print_r($krathu);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>WebBord</title>

   <!-- tailwind css -->
   <link rel="stylesheet" href="./src/output.css">
</head>

<body>

   <div class="m-6 mx-auto max-w-[60rem] h-screen space-y-4 p-3">
      <div class="flex justify-between">
         <div class="rounded-md border border-gray-300 bg-gradient-to-tr from-white via-slate-100 to-black/10 px-2 text-xs text-gray-500 py-1">เว็บบอร์ด</div>
         <div class="rounded-md border border-gray-300 bg-gradient-to-tr from-white via-slate-100 to-black/10 px-2 text-xs text-gray-500 py-1"><span id="current-time"></span></div>
      </div>
      <!-- royal name -->
      <div class="flex flex-col items-center justify-center space-y-2 rounded-md border border-gray-300 bg-gradient-to-tr from-white via-slate-100 to-blue-300/20 p-6 shadow-md">
         <h2 class="text-2xl font-bold">องค์การบริหารส่วนตำบลลาดน้ำเค็ม</h2>
         <p class="text-sm text-gray-500 text-center">ตำบลลาดน้ำเค็ม อำเภอผักไห่ จังหวัดพระนครศรีอยุธยา 13120</p>
      </div>

      <?php if (!empty($krathu_id)) : ?>
         <?php foreach ($krathu as $k => $v) : ?>
            <div class="rounded-md border border-gray-300 bg-gradient-to-r from-white via-slate-100 to-blue-300/20  p-6 shadow-md">
               <!-- title -->
               <div class="flex items-center gap-3">
                  <div class="h-[4rem] w-[4rem]">
                     <img src="./imgs/billboard.png" alt="icons-form" />
                  </div>
                  <h3 class="text-xl"><?= $v['krathu_name']; ?> <span class="text-sm text-blue-500">เมื่อ <?= $v['created']; ?></span></h3>
               </div>
               <!-- end title -->

               <div class="rounded-md border border-gray-300 bg-white p-6 my-6">
                  <!-- title -->
                  <div class="flex flex-row items-center justify-start gap-3">
                     <img src="/imgs/chat.png" alt="chat-icons" class="w-10 h-10">
                     <div>
                        <span class="text-sm text-blue-500">(<?= $v['full_name']; ?>)</span>
                        <p class="text-sm text-gray-700"><?= $v['details']; ?></p>
                     </div>
                  </div>
                  <!-- end title -->
               </div>

               <?php if (!empty($comments)) : ?>
                  <?php foreach ($comments as $k => $c) : ?>
                     <div class="rounded-md border border-gray-300 bg-white p-6 my-6">
                        <!-- title -->
                        <div class="flex flex-row items-center justify-start gap-3">
                           <img src="/imgs/chat.png" alt="chat-icons" class="w-10 h-10">
                           <div>
                              <span class="text-sm text-blue-500">(<?= $c['c_full_name']; ?>)</span>
                              <p class="text-sm text-gray-700"><?= $c['details']; ?></p>
                           </div>
                        </div>
                        <!-- end title -->
                     </div>
                  <?php endforeach; ?>
               <?php endif; ?>

            </div>

            <div class="rounded-md border border-gray-300 bg-gradient-to-r from-white via-slate-100 to-blue-300/20  p-6 shadow-md">
               <!-- title -->
               <div class="flex items-center gap-3">
                  <div class="h-[4rem] w-[4rem]">
                     <img src="./imgs/pointer.png" alt="icons-form" />
                  </div>
                  <h3 class="text-xl">ตอบกลับกระทู้</h3>
               </div>
               <!-- end title -->
               <div class="rounded-md border border-gray-300 bg-white p-6 my-6 w-full">
                  <!-- title -->
                  <div class="flex flex-col items-start gap-3">
                     <form action="/ac/add_comment.php" method="post" class="w-full">
                        <div class="px-4 py-2 overflow-y-auto gap-1 flex flex-col">
                           <label for="details">คำอธิบายเพิ่มเติม</label>
                           <textarea name="details" cols="30" rows="10" class="border-2 rounded-md px-6 py-2 w-full"></textarea>
                        </div>
                        <div class="px-4 py-2 overflow-y-auto gap-1">
                           <label for="full_name">ระบุชื่อจริงและนามสกุลของคุณ</label>
                           <input type="text" name="full_name" class="border-2 rounded-md px-6 py-2 w-full" maxlength="40">
                        </div>
                        <div class="px-4 py-2 overflow-y-auto gap-1">
                           <label for="id_card">รหัสบัตรประจำตัวประชาชน</label>
                           <input type="text" name="id_card" class="border-2 rounded-md px-6 py-2 w-full" maxlength="40">
                        </div>
                        <div class="flex justify-end items-center gap-x-2 py-3 px-4">
                           <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50" data-hs-overlay="#hs-vertically-centered-modal">
                              ยกเลิก
                           </button>
                           <input type="hidden" name="krathu_id" value="<?= $v['krathu_id']; ?>">
                           <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50">
                              ตอบกลับข้อความ
                           </button>
                        </div>
                     </form>
                  </div>
                  <!-- end title -->
               </div>

            </div>
         <?php endforeach; ?>
      <?php endif; ?>

      <div class="flex flex-col items-center justify-center space-y-2rounded-md border border-gray-300 bg-yellow-500 text-white p-6 shadow-md">
         <a href="/" class="text-lg text-center">กลับหน้าหลัก</a>
      </div>

      <!-- footer -->
      <footer class="rounded-md border border-gray-300 bg-gradient-to-tr from-white via-slate-100 to-black/10 px-2 text-xs text-gray-500 py-1 text-center">
         © 2024 Powered by <a href="https://webdeeth.com" target="_blank">webswork labs</a>
      </footer>
      <!-- end footer -->

   </div>

   <script>
      const urlParams = new URLSearchParams(window.location.search);
      if (urlParams.has('success')) {
         // แสดง alert message ว่าการทำรายการสำเร็จ
         alert("การทำรายการสำเร็จแล้ว");
      }
   </script>

   <script src="./node_modules/preline/dist/preline.js"></script>
   <!-- date time script -->
   <script>
      function updateTime() {
         const now = new Date();
         const formattedTime = now.toLocaleString('th-TH', {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: 'numeric',
            minute: 'numeric',
            second: 'numeric',
            hour12: false
         });
         document.getElementById('current-time').textContent = formattedTime;
      }

      // อัปเดตเวลาทุกๆ 1 วินาที
      setInterval(updateTime, 1000);

      // ครั้งแรกที่โหลดหน้าเว็บ
      updateTime();
   </script>
   <!-- end date time script -->
</body>

</html>
