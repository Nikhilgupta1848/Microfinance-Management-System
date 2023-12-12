<?php
session_start();
require_once 'database/db_connection.php';
require_once 'include/head.php';
$success_msg = '';
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
      <strong><?php echo isset($_SESSION['success_msg']) ? $_SESSION['success_msg'] : ''; ?></strong>
   </div>
   <div class="topnav mb-3" id="myTopnav">
      <a href="addaccount_status.php" class="active"><i class="fas fa-money-check"></i> Add new account status</a>
      <a href="manageaccount_status.php" ><i class="fas fa-table"></i> Manage account status</a>
      <a href="pdfaccount_status.php" target="_blank"><i class="fas fa-print"></i> Print all account status</a>
   </div>

      <div class="card">
         <div class="card-header bg-warning text-bold">
            ACCOUNT STATUS
         </div>
         <div class="card-body">
            <?php
$account_type_number = rand(1476089, 1057090807)
?>
            <div class="card-text">
               <form action="app/addaccounts_statusHandler.php" method="post" autocomplete="off">
                  <div class="form-group">
                     <label for="account status number">Account status number</label>
                     <input type="text" name="account_status_number" id="" class="form-control"
                        placeholder="Account status number" aria-describedby="helpId"
                        value=" <?php echo $account_type_number; ?>" readonly>
                  </div>
                  <div class="form-group">
                     <label for="account name">Account status name</label>
                     <input type="text" name="account_status_name" id="" class="form-control"
                        placeholder="Account status name" aria-describedby="helpId">
                  </div>
                  <button type="submit" class="btn btn-primary" name="add_account_status"><i class="fas fa-upload"></i>
                     Add account status</button>
                  <button type="reset" class="btn btn-danger"><i class="fas fa-window-close"></i> Reset</button>
               </form>
            </div>
         </div>
      </div>
</body>
<?php require_once 'include/footer.php'?>