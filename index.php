 <?php require 'inclu/header.php' ?>

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
                     <?php require 'inclu/card.php' ?>
                     <div class="row my-5 bg-white">

                          <div class="col mt-3">
                               <table class="table bg-white rounded shadow-sm  table-hover" id="table">
                                    <thead>
                                         <tr>
                                              <th scope="col" width="50">#</th>
                                              <th scope="col">ຊື່ ແລະ ນາມສະກຸນ</th>
                                              <th scope="col">ເບີໂທ</th>
                                              <th scope="col">ທີ່ຢູ່</th>
                                              <th scope="col" width="50">Action</th>
                                         </tr>
                                    </thead>
                                    <tbody>
                                         <tr>
                                              <th scope="row">1</th>
                                              <td>Television</td>
                                              <td>Jonny</td>
                                              <td>$1200</td>
                                              <td>
                                                   <i class="fas fa-edit text-success"></i>
                                                   <i class="fas fa-trash-alt text-danger"></i>
                                              </td>
                                         </tr>
                                         <tr>
                                              <th scope="row">2</th>
                                              <td>Laptop</td>
                                              <td>Kenny</td>
                                              <td>$750</td>
                                              <td>
                                                   <i class="fas fa-edit text-success"></i>
                                                   <i class="fas fa-trash-alt text-danger"></i>
                                              </td>
                                         </tr>
                                         <tr>
                                              <th scope="row">3</th>
                                              <td>Cell Phone</td>
                                              <td>Jenny</td>
                                              <td>$600</td>
                                              <td>
                                                   <i class="fas fa-edit text-success"></i>
                                                   <i class="fas fa-trash-alt text-danger"></i>
                                              </td>
                                         </tr>
                                         <tr>
                                              <th scope="row">4</th>
                                              <td>Fridge</td>
                                              <td>Killy</td>
                                              <td>$300</td>
                                              <td>
                                                   <i class="fas fa-edit text-success"></i>
                                                   <i class="fas fa-trash-alt text-danger"></i>
                                              </td>
                                         </tr>
                                         <tr>
                                              <th scope="row">5</th>
                                              <td>Books</td>
                                              <td>Filly</td>
                                              <td>$120</td>
                                              <td>
                                                   <i class="fas fa-edit text-success"></i>
                                                   <i class="fas fa-trash-alt text-danger"></i>
                                              </td>
                                         </tr>

                                    </tbody>
                               </table>
                          </div>
                     </div>

                </div>
           </div>
      </div>
      <?php require 'inclu/footer.php' ?>