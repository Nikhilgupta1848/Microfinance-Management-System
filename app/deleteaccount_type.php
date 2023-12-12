<?php
session_start();
require_once '../database/db_connection.php';
$success_del = 'One account type has been deleten successful';

$delete_account =  "DELETE FROM account_type 
WHERE 
account_type_number = '".$_GET['account_type_number']."'";

if (mysqli_query($conn, $delete_account)) {
  $_SESSION['success_del'] = $success_del;
  header('Location:../manageaccount_type.php');
}else {
   echo 'Uknown error occured, please try again';
   mysqli_close($conn);
}
