<?php
session_start();
include_once '../database/db_connection.php';
$success_msg = 'New Account created successfully';


   $account_number = stripcslashes(mysqli_real_escape_string($conn, $_POST['account_number']));
   $customer = stripcslashes(mysqli_real_escape_string($conn, $_POST['customer']));
   $account_type = stripcslashes(mysqli_real_escape_string($conn, $_POST['account_type']));
   $account_status = stripcslashes(mysqli_real_escape_string($conn, $_POST['account_status']));
    if(isset($_POST['update_account'])){
        $update = "UPDATE accounts set customer ='$customer', account_type='$account_type', account_status='$account_status' where account_number='$account_number' ";
        if (mysqli_query($conn, $update)) {
            $_SESSION['success_msg'] = "Account has been updated successfully.";
            header('Location: ../updateaccount.php?account_number='.$account_number);
        } else {
            echo "Error: " . $insert . " " . mysqli_error($conn);
        }
    }else{
        $insert = "INSERT INTO accounts
        (account_number, customer, account_type, account_status)
        VALUES
        ('$account_number','$customer', '$account_type', '$account_status')";

        if (mysqli_query($conn, $insert)) {
            $_SESSION['success_msg'] = $success_msg;
            header('Location: ../openaccount.php');
        } else {
            echo "Error: " . $insert . " " . mysqli_error($conn);
        }
    }
    
    mysqli_close($conn);


