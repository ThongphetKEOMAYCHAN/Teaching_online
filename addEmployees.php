 <?php require 'inclu/header.php';

     require 'inclu/connect.php';
     session_start();
     $date = date("Y-m-d");
     $em_id = $username = $tel = $address = "";

     if (isset($_POST['btnAdd'])) {
          $username = $_POST['username'];
          $tel = $_POST['tel'];
          $address = $_POST['address'];

          $sql = "select * from employee where em_tel = '$tel'";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
               $error = 'ເບີໂທລະສັບຖືກນຳໃຊ້ແລ້ວ';
               // echo 'error';
          } else {
               $sql = "INSERT INTO `employee`(`em_username`, `em_tel`, `address`, `date`) VALUES ('$username','$tel','$address', '$date')";
               $result = mysqli_query($conn, $sql);
               if ($result) {

                    $msg = '<script>swal("ສຳເລັດ!", "ເພີ່ມຂໍ້ມູນພະນັກງານສຳເລັດແລ້ວ!", "success");</script';

                    echo "
                    <script>if(windows.history.replaceState){
                      windows.history.replaceState(null, window.location.href);
                 }
                 </script>";
               }
          }
     }
     ?>

 <body>
      <div class="d-flex" id="wrapper">
           <!-- Sidebar -->
           <?php require 'inclu/sidebar.php'
               ?>
           <?= @$msg ?>
           <!-- Page Content -->
           <div id="page-content-wrapper">
                <!------navbar----------->
                <?php require 'inclu/nav.php' ?>

                <div class="container-fluid px-4">
                     <!----card--------->
                     <?php require 'inclu/card.php' ?>
                     <div class="row my-5 bg-white justify-content-center">

                          <div class="col-lg-6 mt-3 mb-3">
                               <div class="card" style="background-color: #49daa5;">
                                    <div class="card-body">
                                         <h5 class="text-center mb-4">ເພີ່ມຂໍ້ມູນພະນັກງານ</h5>
                                         <form action="" method="POST">
                                              <div class="mb-3">
                                                   <label class="form-label">ຊື່ ແລະ ນາມສະກຸນ</label>
                                                   <input type="text" name="username" class="form-control" placeholder="ປ້ອນຊື່ ແລະ ນາມສະກຸນ" required value="<?= @$username ?>">
                                              </div>
                                              <div class="mb-3">
                                                   <label class="form-label">ເບີໂທ</label>
                                                   <input type="number" name="tel" class="form-control" placeholder="ປ້ອນເບີໂທ" required value="<?= @$tel ?>">
                                                   <div class="form-control-feedback text-danger">
                                                        <?= @$error ?>
                                                   </div>
                                              </div>
                                              <div class="mb-3">
                                                   <label>ທີຢູ່</label>
                                                   <textarea name="address" class="form-control" placeholder="ປ້ອນທີຢູ່" required value="<?= @$address ?>"></textarea>

                                              </div>
                                              <div class="modal-footer">
                                                   <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                   <button type="submit" name="btnAdd" class="btn btn-primary">Save</button>
                                              </div>
                                         </form>

                                    </div>

                               </div>
                          </div>
                     </div>

                </div>
           </div>
      </div>

      <script>
           if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
           }
      </script>
      <?php require 'inclu/footer.php' ?>