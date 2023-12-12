<?php
session_start();
require_once 'database/db_connection.php';
require_once 'include/head.php';
$success_del = '';
// retrieve data from database
$retrieve = mysqli_query($conn, "SELECT * FROM account_status ORDER BY registration_date DESC");

?>
<?php require_once 'include/head.php';?>

<body>
   <?php
require_once 'include/navbar.php';
require_once 'include/sidebar.php';

if (mysqli_num_rows($retrieve) > 0) {

    ?>
   <div class="ms-4 mr-4 ">
    <div class="alert alert-success alert-dismissible fade show " role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
         </button>
         <strong><?php echo $success_del; ?></strong>
      </div>
      <div class="topnav mb-3" id="myTopnav">
      <a href="addaccount_status.php" class="active"><i class="fas fa-money-check"></i> Add new account status</a>
      <a href="manageaccount_status.php" ><i class="fas fa-table"></i> Manage account status</a>
      <a href="pdfaccount_status.php" target="_blank"><i class="fas fa-print"></i> Print all account status</a>
   </div>

      <table id="customers" class="mt-3">
         <thead class=" bg-success table-bordered">
            <tr>
               <th>SN</th>
               <th>Account status number</th>
               <th>Account status name</th>
               <th>Date created</th>
               <th>Action</th>
            </tr>
         </thead>
         <?php
$num = 1;
    $i = 0;
    while ($result = mysqli_fetch_assoc($retrieve)) {
        ?>

         <tbody class="table-bordered">
            <tr>
               <td><?php echo $num++; ?></td>
               <td><?php echo $result["account_status_number"]; ?></td>
               <td><?php echo $result["account_status_name"]; ?></td>
               <td><?php echo $result["registration_date"]; ?></td>
               <td>
                  <a href="updateaccount_status.php?account_status_number=<?php echo $result["account_status_number"]; ?>" type="submit"
                     class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>
                  <a href="app/deleteaccount_status.php?account_status_number=<?php echo $result["account_status_number"]; ?>"
                     type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                  <a href="pdf_singleaccount_status.php?account_status_number=<?php echo $result["account_status_number"]; ?>"
                     type="submit" class="btn btn-primary" target="_blank"><i class="fas fa-print"></i> Print</a>
               </td>
            </tr>
         </tbody>
         <?php
$i++;
    }
    ?>
      </table>
      </div>
   </div>
   <?php
} else {
    echo 'No result found';
}?>

</body>
<?php require_once 'include/footer.php';?>