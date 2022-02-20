 <?php require 'inclu/header.php';

     require 'inclu/connect.php';
     session_start();
     $date = date("Y-m-d");
     $em_id = $username = $tel = $address = $msg = "";

     if (isset($_POST['btnEdit'])) {

          $em_id = $_POST['emid'];
          $username = $_POST['username'];
          $tel = $_POST['tel'];
          $address = $_POST['address'];

          $sql = "UPDATE `employees` SET `em_username`='$username',`em_tel`='$tel',`address`='$address',`date`='$date' WHERE em_id = '$em_id'";

          $result = mysqli_query($conn, $sql);
          if ($result) {
               $msg =  "$em_id,$username, $tel,$address";
          } else {
               echo mysqli_error($conn);
          }
     }

     ?>

 <body>
      <div class="d-flex" id="wrapper">
           <!-- Sidebar -->
           <?php require 'inclu/sidebar.php' ?>
           <!-- Page Content -->
           <div id="page-content-wrapper">
                <!------navbar----------->
                <?php require 'inclu/nav.php' ?>

                <div class="container-fluid px-4">
                     <!----card--------->
                     <?php echo $msg ?>
                     <?php require 'inclu/card.php' ?>
                     <div class="row my-5 bg-white">
                          <div class="col-md-12 mt-3">
                               <div class="card mb-3">
                                    <div class="card-body">
                                         <a href="/addEmployees.php" class="btn btn-success">ເພີ່ມພະນັກງານ</a>
                                    </div>
                               </div>
                               <table class="table bg-white rounded shadow-sm  table-hover overflow-auto" id="table">
                                    <thead>
                                         <tr>
                                              <th scope="col" width="50">#</th>
                                              <th scope="col">ຊື່ ແລະ ນາມສະກຸນ</th>
                                              <th scope="col">ເບີໂທ</th>
                                              <th scope="col">ທີ່ຢູ່</th>
                                              <th scope="col">ວັນເດືອນປິ</th>
                                              <th scope="col" width="100">Action</th>
                                         </tr>
                                    </thead>
                                    <tbody>
                                         <?php
                                             $sql = "select * from employee";
                                             $result = mysqli_query($conn, $sql);
                                             while ($row = mysqli_fetch_assoc($result)) {


                                             ?>
                                              <tr>
                                                   <td><?= $row['em_id'] ?></td>
                                                   <td><?= $row['em_username'] ?></td>
                                                   <td><?= $row['em_tel'] ?></td>
                                                   <td><?= $row['address'] ?></td>
                                                   <td><?= $row['date'] ?></td>
                                                   <td>
                                                        <button data-id="<?php echo $row['em_id'] ?>" class="userInfo btn btn-success btn-sm">edit</button>
                                                        <button type="submit" class="btn btn-success btn-sm btnEditShow" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-placement="top" title="ແກ້ໄຂ">
                                                             <i class="fas fa-edit"></i>
                                                        </button>
                                                        <a href="#" class="btn btn-danger btn-sm" onclick="deleteData(<?php echo '\'' . $row['em_id'] . '\''; ?>)" data-bs-placement="top" title="ລົບ"><i class="fas fa-trash-alt text-white"></i></a>
                                                   </td>
                                              </tr>
                                         <?php } ?>
                                    </tbody>
                               </table>
                          </div>
                     </div>

                </div>
           </div>
      </div>
      <!----modal----->
      <!-- Button trigger modal -->

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog">
                <div class="modal-content">

                     <div class="modal-body">

                          <div class="card-body">
                               <h5 class="text-center mb-4">ແກ້ໄຂຂໍ້ມູນພະນັກງານ</h5>
                               <form action="/employeesUpdate.php" method="POST">
                                    <input type="text" name="emid" id="eid" value="<?= $id ?>">
                                    <div class="mb-3">

                                         <label class="form-label">ຊື່ ແລະ ນາມສະກຸນ</label>

                                         <input type="text" name="username" id="username" class="form-control" placeholder="ປ້ອນຊື່ ແລະ ນາມສະກຸນ" value="<?= $username ?>">
                                    </div>
                                    <div class="mb-3">
                                         <label class="form-label">ເບີໂທ</label>
                                         <input type="number" name="tel" class="form-control" id="number" placeholder="ປ້ອນເບີໂທ">
                                    </div>
                                    <div class="mb-3">
                                         <label>ທີຢູ່</label>
                                         <textarea name="address" class="form-control" id="address" placeholder="ປ້ອນທີຢູ່"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                         <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                         <button type="submit" name="btnEdit" class="btn btn-primary ">Save</button>
                                    </div>

                               </form>
                          </div>

                     </div>

                </div>
           </div>
      </div>

      <script type="text/javascript">
           $(document).ready(function() {
                $('.userInfo').click(function() {
                     var userId = $(this).data('em_id');
                     alert(userId);
                });
           });
      </script>
      <script>
           function deleteData(id) {
                swal({
                          title: "ເຈົ້າຕ້ອງການລົບແທ້ບໍ່ ?",
                          text: "ຂໍ້ມູນ" + id + "ເມື່ອລົບແລ້ວຈະບໍ່ສາມາດຂື້ນໄດ້ອີກ !",
                          icon: "warning",
                          buttons: true,
                          dangerMode: true,
                          buttons: ['ຍົກເລີກ', ' ຕົກລົງ']
                     })
                     .then((willDelete) => {
                          if (willDelete) {
                               $.ajax({
                                    url: "employeesUpdate.php",
                                    method: "post",
                                    data: {
                                         em_id: id
                                    },
                                    success: function(data) {
                                         swal("ສຳເລັດ", "ລົບຂໍ້ມຸນສຳເລັດແລ້ວ !", "success", {
                                              button: "ຕົກລົງ"
                                         });
                                         setTimeout(function() {
                                              location.reload();
                                         }, 2000);
                                    }
                               });

                          } else {
                               swal("ຂໍ້ມູນຂອງທ່ານຍັງປອດໄພ", {
                                    buttons: "ຕົກລົງ"
                               });
                          }
                     });
           }
          //  $(document).ready(function() {
          //       $('.btnEditShow').on('click', function() {

          //            $('#exampleModal').modal('show');

          //            $tr = $(this).closest('tr');
          //            var data = $tr.children('td').map(function() {
          //                 return $(this).text();
          //            }).get();
          //            console.log(data);
          //            $('#eid').val(data[0]);
          //            $('#username').val(data[1]);
          //            $('#number').val(data[2]);
          //            $('#address').val(data[3]);

          //       });
          //  });
      </script>
      <?php require 'inclu/footer.php' ?>