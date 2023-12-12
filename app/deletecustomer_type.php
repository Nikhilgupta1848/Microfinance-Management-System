<?php
session_start();
$delete_msg = 'One type of customer has been deleted';

require_once '../database/db_connection.php';
$delete_customer_type = "DELETE FROM customers_type
 WHERE 
 customer_type_number = '".$_GET['customer_type_number']."'";

if (mysqli_query($conn, $delete_customer_type)) {

   header('Location:../manage_customer_type.php');
   $_SESSION['delete_msg'] = $delete_msg;
}else {
   echo 'Uknown error occured during deleting, check the data you are trying to delete and delete again';
   mysqli_close($conn);
}