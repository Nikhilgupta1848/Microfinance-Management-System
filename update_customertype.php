<?php
session_start();
require_once 'database/db_connection.php';
require_once 'include/head.php';
$success_msg = '';

// update customer type
if (count($_POST) > 0) {
  mysqli_query($conn, "UPDATE customers_type SET 
  customer_type_name = '" .$_POST['customer_type_name'] ."'
   WHERE
    customer_type_number = '".$_POST['customer_type_number'] ."' ");

   $message = 'Customer type record has been successfully updated';
}
$result = mysqli_query($conn, "SELECT * FROM customers_type 
WHERE customer_type_number = '".$_GET['customer_type_number']."'");
$row = mysqli_fetch_assoc( $result);

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
         <strong><?php if(isset($message)) {echo $message;} ?></strong>
      </div>

      <div class="card">
         <div class="card-header bg-primary text-bold">
         UPDATE CUSTOMER TYPE
         </div>
         <div class="card-body">
            <h5 class="card-title">Fill all field as required</h5>
            <div class="card-text">
               <form action="" method="post" autocomplete="off">
                  <div class="form-group">
                     <label for="customer type number">Customer type number</label>
                     <input type="hidden" name="customer_type_number" value=" <?php echo $row['customer_type_number']; ?>">
                     <input type="text" name="" id="" class="form-control" placeholder="Customer type number" 
                     aria-describedby="helpId" value=" <?php echo $row['customer_type_number']; ?>" readonly>
                  </div>
                  <div class="form-group">
                     <label for="customer type name">Customer type name</label>
                     <input type="text" name="customer_type_name" id="" class="form-control"
                        placeholder="Customer type name" aria-describedby="helpId" value="<?php echo $row['customer_type_name']; ?>">
                  </div>
                  <button type="submit" class="btn btn-primary" name="add_customer_type"><i class="fas fa-upload"></i>
                     Add customer type</button>
                  <button type="reset" class="btn btn-danger"><i class="fas fa-window-close"></i> Reset</button>
               </form>
            </div>
         </div>
      </div>
</body>
<?php require_once 'include/footer.php'?>