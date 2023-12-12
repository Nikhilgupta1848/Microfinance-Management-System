<?php
session_start();
include_once '../database/db_connection.php';
$success_msg = 'New customer type successfully created';

if (isset($_POST['add_customer_type'])) {

    $customer_type_number = stripcslashes(mysqli_real_escape_string ($conn, $_POST['customer_type_number']));
    $customer_type_name = stripcslashes(mysqli_real_escape_string ($conn, $_POST['customer_type_name']));

    $insert = "INSERT INTO customers_type 
    (customer_type_number, customer_type_name)
	 VALUES
    ('$customer_type_number','$customer_type_name')";

    if (mysqli_query($conn, $insert)) {
        header('Location: ../addcustomer_type.php');
        $_SESSION['success_msg'] = $success_msg;
    } else {
        echo "Error: " . $insert . " " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
