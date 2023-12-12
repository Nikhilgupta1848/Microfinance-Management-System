<?php
session_start();
require_once 'include/head.php';
require_once 'database/db_connection.php';
$success_msg = '';

// Update customer detail
if (count($_POST) > 0) {
    mysqli_query($conn, "UPDATE customers SET
  customer_type = '" . $_POST['customer_type'] . "', first_name = '" . $_POST['first_name'] . "',
  middle_name = '" . $_POST['middle_name'] . "', surname ='" . $_POST['surname'] . "',
  nationality = '" . $_POST['nationality'] . "', date_of_birth = '" . $_POST['date_of_birth'] . "',
  gender = '" . $_POST['gender'] . "'
  WHERE
  customer_number = '" . $_POST['customer_number'] . "'");

  $success_msg = ' Information successfully updated';

}
$update_customer = mysqli_query($conn, "SELECT * FROM customers
WHERE
customer_number = '" . $_GET['customer_number'] . "'");
$query = mysqli_fetch_assoc($update_customer);
?>

<body>
  <?php require_once 'include/navbar.php';?>
  <?php require_once 'include/sidebar.php';?>

  <body>
  <div class="alert alert-success alert-dismissible fade show " role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         <span class="sr-only">Close</span>
      </button>
      <strong><?php if (isset($success_msg)) { echo $query['first_name'] . $success_msg; } ?></strong>
   </div>

    <form action="" method="post" autocomplete="off">
      <div class="row">
        <div class="col-md-12 col-sm-4">
          <div class="form-group">
            <label for="">Customer number</label>
            <div class="input-group">
            <input type="hidden" name="customer_number" value=" <?php echo $query['customer_number']; ?>">
              <input type="number" name="" class="form-control" placeholder="Customer number"
                value="<?php echo $query['customer_number']; ?>" readonly>
              <small class="input-group-text"><i class="fas fa-user-cog"></i></small>
            </div>
          </div>
        </div>

        <div class="col-md-12 col-sm-4">
          <div class="form-group">
            <label for="">Customer Type Nnumber</label>
            <select class="custom-select" name="customer_type" id="" value="<?php echo $query['customer_type']; ?>">
              <?php
               $result = mysqli_query($conn, "SELECT customer_type_number, customer_type_name FROM customers_type");
               ?>
               <?php
               while ($row = mysqli_fetch_assoc($result)) {
               ?>
              <option disabled><?php echo $row['customer_type_name']; ?></option>
              <option value="<?php echo $row['customer_type_number']; ?>">
              <?php echo $row['customer_type_number']; ?>
              </option>
              <?php }?>
            </select>
          </div>
        </div>

        <div class="col-md-6 col-sm-4">
          <div class="form-group">
            <label for="">First name</label>
            <input type="text" name="first_name" id="" class="form-control" placeholder="First name" 
            value="<?php echo $query['first_name']; ?>">
          </div>
        </div>

        <div class="col-md-6 col-sm-4">
          <div class="form-group">
            <label for="">Middle name</label>
            <input type="text" name="middle_name" id="" class="form-control" placeholder="Middle name"
            value="<?php echo $query['middle_name'];?>" >
          </div>
        </div>

        <div class="col-md-6 col-sm-4">
          <div class="form-group">
            <label for="">Surname</label>
            <input type="text" name="surname" id="" class="form-control" placeholder="Surname"
            value="<?php echo $query['surname'];?>">
          </div>
        </div>

        <div class="col-md-6 col-sm-4">
          <div class="form-group">
            <label for="">Nationality</label>
            <select name="nationality" id="" class="form-control" value="<?php echo $query['nationality'];?>">
              <option value="">Select Nationality</option>
              <option value="Kenyan">Kenya</option>
              <option value="Ugandan">Uganda</option>
              <option value="Tanzanian" selected>Tanzania</option>
            </select>
          </div>
        </div>
        <div class="col-md-12 col-sm-4">
          <div class="form-group">
            <label for="">Date of birth</label>
            <input type="date" name="date_of_birth" id="" class="form-control" placeholder="Date of birth"
            value="<?php echo $query['date_of_birth'];?>">
          </div>
        </div>

        <div class="col-md-6 col-sm-4">
          <div class="form-group">
           <label for="">Gender: </label>  <?php echo $query['gender'];?>
          </div>
        </div>
            <div class="col-md-6 col-sm-4">
          <div class="form-group">
            <label for="">Gender</label>
            Male: <input type="radio" name="gender" id="" value="M">
            Female: <input type="radio" name="gender" id="" value="F">
            Others: <input type="radio" name="gender" id="" value="O">
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-lg btn-primary" name="addcustomer">Update Customer </button>
        </div>

      </div>
    </form>
    </main>
  </body>