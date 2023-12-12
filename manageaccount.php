<?php
session_start();
require_once 'database/db_connection.php';
require_once 'include/head.php';
$success_del = '';
// retrieve data from database
$retrieve = mysqli_query($conn, 
"SELECT 
a.account_number, 
a.open_date,
c.first_name AS account_name,
c.middle_name AS middle_account_name,
c.surname AS last_account_name,
ct.customer_type_name AS customer_type,
act.account_type_name AS account_type,
acs.account_status_name AS account_status
FROM accounts a
INNER JOIN customers c ON a.customer = c.customer_number
INNER JOIN customers_type ct ON c.customer_type = ct.customer_type_number
INNER JOIN account_type act ON a.account_type = act.account_type_number
INNER JOIN account_status acs  ON a.account_status = acs.account_status_number
ORDER BY open_date DESC;
");

?>
<?php require_once 'include/head.php';?>

<body>
   <?php
require_once 'include/navbar.php';


if (mysqli_num_rows($retrieve) > 0) {

    ?>
   <div class="ms-4 mr-4 ">
   
    <div class="topnav mt-3" id="myTopnav">
      <a href="openaccount.php" class="active"><i class="fas fa-money-check"></i> Create new account</a>
      <a href="manageaccount.php" ><i class="fas fa-table"></i> Manage account</a>
      <a href="pdfaccount.php" target="_blank"><i class="fas fa-print"></i> Print all account</a>
   </div>

      <table id="customers" class="mt-3 mb-4">
         <thead class=" bg-success table-bordered">
            <tr>
               <th>SN</th>
               <th>Account number</th>
               <th>Account name</th>
               <th>Account type</th>
               <th>Customer Type</th>
               <th>Account status</th>
               <th>Date opened</th>
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
               <td><?php echo $result["account_number"]; ?></td>
               <td rowspan="4"><?php echo $result["account_name"] .' '.$result['middle_account_name'] . ' '. $result['last_account_name']; ?></td>
               <td><?php echo $result["account_type"]; ?></td>
               <td><?php echo $result["customer_type"]; ?></td>
               <td class="align-text-center">
               <span class="badge badge-pill badge-primary">
               <?php echo $result["account_status"]; ?>
               </span>
               </td>
               <td><?php echo $result["open_date"]; ?></td>
               <td>
                  <a href="updateaccount.php?account_number=<?php echo $result["account_number"]; ?>" type="submit"
                     class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>
                  <a href="app/deleteaccount.php?account_number=<?php echo $result["account_number"]; ?>"
                     type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                  <a href="pdfaccount.php?account_number=<?php echo $result["account_number"]; ?>"
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