<?php
session_start();
require_once 'database/db_connection.php';
require_once 'include/head.php';
$update_success_msg = '';
$result = mysqli_query($conn, "SELECT * FROM accounts
WHERE account_number = '" . $_GET['account_number'] . "'");
$row = mysqli_fetch_assoc($result);
$rdata = [];
foreach($row as $k =>$v){
    $rdata[$k] = $v;
}
?>
<body>
   <?php 
require_once 'include/navbar.php';
require_once 'include/sidebar.php';
?>

 <div class="topnav mb-3" id="myTopnav">
      <a href="openaccount.php" class="active"><i class="fas fa-money-check"></i> Create new account</a>
      <a href="manageaccount.php" ><i class="fas fa-table"></i> Manage account</a>
      <a href="pdfaccount.php" target="_blank"><i class="fas fa-print"></i> Print all account</a>
   </div>
   <div class="card ">
      <div class="card-header bg-primary text-bold">
         CUSTOMER ACCOUNT OPENING FORM
      </div>
      <div class="card-body">
         <div class="card-text">
          <div class="alert alert-success alert-dismissible fade show " role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         <span class="sr-only">Close</span>
      </button>
      <strong><?php echo $_SESSION['success_msg']; ?></strong>
   </div>
            <form action="app/openaccountHandler.php" method="post">
               <div class="row">
                  <?php 
                  
               $account_number = $row['account_number'];
               ?>
                  <div class="col-md-12 col-sm-6">
                     <div class="form-group">
                        <label for="account number">Account number</label>
                        <input type="text" name="account_number" id="" class="form-control" placeholder="" aria-describedby="helpId"
                        value="<?php echo $account_number;?>" readonly>
                     </div>
                  </div>
                  <div class="col-md-12 col-sm-6">
                  <div class="form-group">
                     <label for="customer info">Customer Information</label>
                     <select class="custom-select" name="customer" id="">
                     <option selected>Select one</option>
                      <?php
                        $result = mysqli_query($conn, "SELECT customer_number, first_name FROM customers");
                        ?>
                        <?php
                        while($row =mysqli_fetch_assoc($result)){
                        ?>
                        
                        <option disabled><?php echo $row['first_name'];?></option>
                        <option value="<?php echo $row['customer_number'];?>" <?php echo $row['customer_number'] == $rdata['customer'] ? "selected" : '';?>>
                        <?php echo $row['customer_number'];?></option>
                        <?php } ?>
                     </select>
                  </div>
                  </div>
                  <div class="col-md-12 col-sm-6">
                  <div class="form-group">
                     <label for="account_type">Account Type</label>
                     <select class="custom-select" name="account_type" id="">
                     <option selected>Select one</option>
                         <?php
                           $results = mysqli_query($conn, "SELECT account_type_number, account_type_name FROM account_type");
                           ?>
                        <?php
                        while ($rows = mysqli_fetch_assoc($results)){ 
                           ?>
                        
                        <option disabled><?php echo $rows['account_type_name']; ?></option>
                        <option value="<?php echo $rows['account_type_number']; ?>" <?php echo $rows['account_type_number'] == $rdata['account_type'] ? "selected" : ''; ?>>
                        <?php echo $rows['account_type_number']; ?></option>
                        <?php }?>
                     </select>
                  </div>
                  </div>
                  <div class="col-md-12 col-sm-6">
                  <div class="form-group">
                     <label for="customer info">Account status</label>
                     <select class="custom-select" name="account_status" id="">
                      <option selected>Select one</option>
                        <?php
                        $results = mysqli_query($conn, "SELECT account_status_number, account_status_name FROM account_status");
                        ?>
                        <?php
                        while ($rows = mysqli_fetch_assoc($results)){
                        ?>
                       
                        <option disabled><?php echo $rows['account_status_name']; ?></option>
                        <option value="<?php echo $rows['account_status_number']; ?>" <?php echo $rows['account_status_number'] == $rdata['account_status'] ? "selected" : ''; ?>>
                        <?php echo $rows['account_status_number']; ?></option>
                        <?php }?>
                     </select>
                  </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="update_account">Update Account</button>
                  </div>

               </div>
            </form>
         </div>
      </div>
   </div>
</body>
<?php require_once 'include/footer.php'; ?>