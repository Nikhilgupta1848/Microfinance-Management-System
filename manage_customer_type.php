<?php
session_start();
require_once 'database/db_connection.php';
require_once 'include/head.php';

// retrieve data from database
$retrieve = mysqli_query($conn, "SELECT * FROM customers_type ORDER BY registration_date DESC");

?>
<?php require_once 'include/head.php'; ?>

<body>
   <?php 
  require_once 'include/navbar.php'; 
  require_once 'include//sidebar.php'; 
  if (mysqli_num_rows($retrieve) > 0) {
  
  
  ?>

   <div class="topnav" id="myTopnav">
      <a href="addcustomer_type.php" class="active"><i class="fas fa-user-plus"></i> Add new type of customer</a>
      <a href="pdfcustomer_type.php" target="_blank"><i class="fas fa-print"></i> Print all customer type</a>
   </div>
   
   <table id="customers" class="mt-3">
      <thead class=" bg-success table-bordered">
         <tr>
            <th>Serial Number</th>
            <th>Customer type number</th>
            <th>Customer type name</th>
            <th>Date added</th>
            <th>Action</th>
         </tr>
      </thead>
      <?php 
         $num = 1;
         $i=0;
         while ($result = mysqli_fetch_assoc($retrieve)) {
         ?>

      <tbody class="table-bordered">
         <tr>
            <td><?php echo $num++; ?></td>
            <td><?php echo $result["customer_type_number"]; ?></td>
            <td><?php echo $result["customer_type_name"];?></td>
            <td><?php echo $result["registration_date"];?></td>
            <td>
               <a href="update_customertype.php?customer_type_number=<?php echo $result["customer_type_number"]; ?>"
                  type="submit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>
               <a href="app/deletecustomer_type.php?customer_type_number=<?php echo $result["customer_type_number"]; ?>"
                type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
               <a href="pdf_singlecustomer_type.php?customer_type_number=<?php echo $result['customer_type_number'];?>" type="submit" class="btn btn-primary" target="_blank"><i class="fas fa-print"></i> Print</a>
            </td>
         </tr>
      </tbody>
      <?php 
         $i++;
         }
         ?>
   </table>
   </div>
   <?php 
  }else {
     echo 'No result found';
  } ?>
  
</body>
<?php require_once 'include/footer.php';?>