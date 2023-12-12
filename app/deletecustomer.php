<?php 
session_start();
require_once '../database/db_connection.php';
 
$deletecustomer = "DELETE FROM customers WHERE customer_number = '".$_GET['customer_number']."'";
if (mysqli_query($conn, $deletecustomer)) {
  header('Location: ../managecustomer.php');

}else {
  echo 'Something went wrong when deleting please try again';
  mysqli_close($conn);
}
