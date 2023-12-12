<?php
session_start();
require_once 'database/db_connection.php';
require_once 'include/head.php';
$acc_success_msg = '';
?>

<body class="bg-light">
   <?php
require_once 'include/navbar.php';
require_once 'include/sidebar.php';
?>
   <div class="container col-md-10 ms-5">
   <div class="alert alert-success alert-dismissible fade show " role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         <span class="sr-only">Close</span>
      </button>
      <strong><?php echo isset($_SESSION['acc_success_msg']) ? $_SESSION['acc_success_msg'] : ""; ?></strong>
   </div>
   <div class="topnav mb-3" id="myTopnav">
      <a href="addaccount_type.php" class="active"><i class="fas fa-money-check"></i> Add new account type</a>
      <a href="manageaccount_type.php" ><i class="fas fa-table"></i> Manage account type</a>
      <a href="pdfaccount_type.php" target="_blank"><i class="fas fa-print"></i> Print all account type</a>
   </div>
   
      <div class="card">
         <div class="card-header bg-warning text-bold">
            ACCOUNT TYPE
         </div>
         <div class="card-body">
            <?php
            $account_type_number = rand(1476089, 1057090807)
            ?>

            <h5 class="card-title">Fill all field as required</h5>
            <div class="card-text">
               <form action="app/addaccounts_typeHandler.php" method="post" autocomplete="off">
                  <div class="form-group">
                     <label for="customer type number">Account type number</label>
                     <input type="text" name="account_type_number" id="" class="form-control"
                        placeholder="Customer type number" aria-describedby="helpId"
                        value=" <?php echo $account_type_number; ?>" readonly>
                  </div>
                  <div class="form-group">
                     <label for="customer type name">Account type name</label>
                     <input type="text" name="account_type_name" id="" class="form-control"
                        placeholder="Customer type name" aria-describedby="helpId">
                  </div>
                  <button type="submit" class="btn btn-primary" name="add_account_type"><i class="fas fa-upload"></i>
                     Add
                     customer type</button>
                  <button type="reset" class="btn btn-danger"><i class="fas fa-window-close"></i> Reset</button>
               </form>
            </div>
         </div>
      </div>
</body>
<?php require_once 'include/footer.php'?>