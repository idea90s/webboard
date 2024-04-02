<?php
require_once('./db/db.php');
$krathus = $c->getAllKrathu();

$sitekey = "6Lc88yUnAAAAAOpUe9LW86ZW1W_9tpoc9d4fJAi0";
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

      <div class="rounded-md border border-gray-300 bg-gradient-to-r from-white via-slate-100 to-blue-300/20  p-6 shadow-md">
         <!-- title -->
         <div class="flex items-center gap-3">
            <div class="h-[4rem] w-[4rem]">
               <img src="./imgs/billboard.png" alt="icons-form" />
            </div>
            <h3 class="text-xl">กระดานเว็บบอร์ด <span class="text-sm text-blue-500">(หน่วยงานราชการ)</span></h3>
         </div>
         <!-- end title -->

         <!-- link items -->
         <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">

            <button onclick="showForm('form1')" class="rounded-md border border-gray-300 bg-red-700 px-4 py-3 text-white shadow-md shadow-gray-50 transition duration-700 ease-in-out hover:scale-105 hover:border-red-700 hover:bg-red-100 hover:text-red-700">
               <p class="text-start text-2xl">กระทู้ร้องเรียน & ร้องทุกข์</p>
               <p class="text-start">สนทนาเรื่องร้องเรียนต่างๆ</p>
            </button>
         </div>
         <!-- end links item -->
      </div>

      <!-- form1 -->
      <div class="form-container rounded-md border border-red-700 bg-gradient-to-tr from-white via-slate-100 to-red-300/20 p-6 shadow-md" id="form1" style="display:none;">
         <div class="flex flex-row justify-between">
            <h6 class="text-xl">กระดาน ร้องเรียน & ร้องทุกข์</h6>
            <button type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50" data-hs-overlay="#hs-vertically-centered-modal">
               สร้างกระทู้ใหม่
            </button>

            <div id="hs-vertically-centered-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
               <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
                  <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl">
                     <div class="flex justify-between items-center py-3 px-4 border-b">
                        <h3 class="text-2xl font-bold text-blue-700">
                           เพิ่มหัวข้อใหม่
                        </h3>
                        <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50" data-hs-overlay="#hs-vertically-centered-modal">
                           <span class="sr-only">Close</span>
                           <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                              <path d="M18 6 6 18" />
                              <path d="m6 6 12 12" />
                           </svg>
                        </button>
                     </div>
                     <form action="/ac/add_krathu.php" method="post">
                        <div class="px-4 py-2 overflow-y-auto gap-1">
                           <label for="krathu_name">ชื่อกระทู้</label>
                           <input type="text" name="krathu_name" class="border-2 rounded-md px-6 py-2 w-full" maxlength="40">
                        </div>
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
                        <!-- recaptcha -->
                        <div class="mb-6 flex justify-center">
                           <div class="g-recaptcha" data-sitekey="<?= $sitekey; ?>"></div>
                        </div>
                        <!-- end recaptcha -->
                        <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                           <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50" data-hs-overlay="#hs-vertically-centered-modal">
                              ยกเลิก
                           </button>
                           <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50">
                              สร้างกระทู้
                           </button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>

         <!-- table -->
         <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
               <div class="p-1.5 min-w-full inline-block align-middle">
                  <div class="overflow-hidden">
                     <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                           <tr>
                              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">ชื่อกระทู้</th>
                              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">สร้างโดย</th>

                           </tr>
                        </thead>
                        <tbody>

                           <?php foreach ($krathus as $k => $v) : ?>
                              <tr class="odd:bg-white even:bg-gray-100 hover:bg-gray-100">
                                 <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 flex items-center justify-start space-x-3">
                                    <img src="./imgs/chess.png" alt="icon" class="w-10 h-10">
                                    <a href="/singleboard.php?krathuId=<?= $v['krathu_id']; ?>" class=" cursor-pointer" target="_blank">
                                       <p>
                                          <?= $v['krathu_name']; ?>
                                       </p>
                                    </a>
                                 </td>
                                 <td class="px-6 py-4 whitespace-nowrap text-xs text-gray-600">
                                    <p>
                                       <?= $v['full_name']; ?>

                                    </p>
                                    <p>
                                       <?= $v['created']; ?>

                                    </p>
                                 </td>
                                 <!--
                                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                       <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Delete</button>
                                    </td> -->
                              </tr>
                           <?php endforeach; ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
         <!-- end table -->
      </div>
      <!-- end form1 -->







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
         alert("สร้างกระทู้สำเร็จแล้วค่ะ");
      }
      if (urlParams.has('c-err')) {
         // แสดง alert message ว่าการทำรายการสำเร็จ
         alert("กรุณายืนยันตัวตนด้วยค่ะ reCaptcha 🙏🏻");
      }
      if (urlParams.has('err')) {
         // แสดง alert message ว่าการทำรายการสำเร็จ
         alert("ไม่สามารถทำรายการได้ในขณะนี้กรุณาลองอีกครั้งค่ะ 🙏🏻");
      }
   </script>


   <script src="./node_modules/preline/dist/preline.js"></script>
   <!--show form function -->
   <script>
      function showForm(formId) {
         var allForms = document.querySelectorAll('.form-container');
         allForms.forEach(form => {
            form.style.display = 'none';
         });

         var selectedForm = document.getElementById(formId);
         selectedForm.style.display = 'block';

         selectedForm.scrollIntoView({
            behavior: 'smooth'
         });
      }
   </script>
   <!-- end show form function -->
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

   <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>
