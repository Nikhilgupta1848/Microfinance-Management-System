<?php
session_start();
require_once 'database/db_connection.php';
require_once 'include/head.php';

// retrieve data from database
$retrieve = mysqli_query($conn, "SELECT * FROM customers ORDER BY registration_date DESC");

?>
<?php require_once 'include/head.php';?>

<body>
   <?php
require_once 'include/navbar.php';

if (mysqli_num_rows($retrieve) > 0) {

    ?>
   <div class="ms-4 mr-4 ">
      <div class="topnav mt-5" id="myTopnav">
         <a href="addcustomer.php" class="active"><i class="fas fa-user-plus"></i> Add new  customer</a>
         <a href="pdfcustomer.php" target="_blank"><i class="fas fa-print"></i> Print all customer</a>
      </div>

      <table id="customers" class="mt-3">
         <thead class=" bg-success table-bordered">
            <tr>
               <th>SN</th>
               <th>Customer number</th>
               <th>Customer type</th>
               <th>First name</th>
               <th>Middle name</th>
               <th>Surname</th>
               <th>Gender</th>
               <th>DOB</th>
               <th>Nationality</th>
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
               <td><?php echo $result["customer_number"]; ?></td>
               <td><?php echo $result["customer_type"]; ?></td>
               <td><?php echo $result["first_name"];?></td>
               <td><?php echo $result["middle_name"]; ?></td>
               <td><?php echo $result["surname"]; ?></td>
               <td><?php echo $result["gender"];?></td>
               <td><?php echo $result["date_of_birth"];?></td>
               <td><?php echo $result["nationality"];?></td>
               
               <td colspan="">
                  <a href="updatecustomer.php?customer_number=<?php echo $result["customer_number"]; ?>" type="submit"
                     class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>
                  <a href="app/deletecustomer.php?customer_number=<?php echo $result["customer_number"]; ?>"
                     type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                  <a href="pdf_singlecustomer.php?customer_number=<?php echo $result['customer_number']; ?>"
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