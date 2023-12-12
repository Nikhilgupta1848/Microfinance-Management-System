<?php
session_start();
require_once 'database/db_connection.php';
require_once 'include/head.php';
$update_success_msg = '';

// update customer type
if (count($_POST) > 0) {
    mysqli_query($conn, "UPDATE account_status SET
  account_status_name = '" . $_POST['account_status_name'] . "'
   WHERE
    account_status_number = '" . $_POST['account_status_number'] . "' ");

    $update_success_msg = 'it\'s information has been updated successful';
}
$result = mysqli_query($conn, "SELECT * FROM account_status
WHERE account_status_number = '" . $_GET['account_status_number'] . "'");
$row = mysqli_fetch_assoc($result);

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
         <strong><?php if (isset($update_success_msg)) {echo 'Account status with number' . " " . $row['account_status_number'] . ' ' . $update_success_msg;}?></strong>
      </div>
   <div class="topnav mb-3" id="myTopnav">
      <a href="addaccount_status.php" class="active"><i class="fas fa-money-check"></i> Add new account type</a>
      <a href="manageaccount_status.php" ><i class="fas fa-table"></i> Manage account type</a>
      <a href="pdfaccount_status.php" target="_blank"><i class="fas fa-print"></i> Print all account type</a>
   </div>
      <div class="card">
         <div class="card-header bg-warning text-bold">
         UPDATE ACCOUNT STATUS
         </div>
         <div class="card-body">
            <div class="card-text">
               <form action="" method="post" autocomplete="off">
                  <div class="form-group">
                     <label for="account status number">Account STATUS number</label>
                     <input type="hidden" name="account_status_number" value=" <?php echo $row['account_status_number']; ?>">
                     <input type="text" name="" id="" class="form-control" placeholder="Account status number"
                     aria-describedby="helpId" value=" <?php echo $row['account_status_number']; ?>" readonly>
                  </div>
                  <div class="form-group">
                     <label for="account status name">Account status name</label>
                     <input type="text" name="account_status_name" id="" class="form-control"
                        placeholder="Account status name" aria-describedby="helpId" value="<?php echo $row['account_status_name']; ?>">
                  </div>
                  <button type="submit" class="btn btn-primary" name="add_account_status"><i class="fas fa-upload"></i>
                     Update account status</button>
               </form>
            </div>
         </div>
      </div>
</body>
<?php require_once 'include/footer.php'?>