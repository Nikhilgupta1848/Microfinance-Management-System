<?php
session_start();
require_once 'include/head.php';
require_once 'database/db_connection.php';
$success_msg = '';
?>

<body>
  <?php require_once 'include/navbar.php'; ?>
  <?php require_once 'include/sidebar.php'; ?>

  <body>
  <div class="alert alert-success alert-dismissible fade show " role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         <span class="sr-only">Close</span>
      </button>
      <strong><?php echo isset($_SESSION['success_msg']) ? $_SESSION['success_msg'] : ''; ?></strong> 
   </div>
 <div class="topnav" id="myTopnav">
      <a href="addcustomer.php" class="active"><i class="fas fa-user-plus"></i> Add new customer</a>
      <a href="managecustomer.php" ><i class="fas fa-table"></i> Manage customer</a>
      <a href="pdfcustomer.php" target="_blank"><i class="fas fa-print"></i> Print all customer</a>
   </div>
   
    <form action="app/addcustomerHandler.php" method="post" autocomplete="off">
      <div class="row">
        <?php 
        $costant = rand(0,100);
        $customer_number = rand(8802, 10708809);
        ?>
        <div class="col-md-12 col-sm-4">
          <div class="form-group">
            <label for="">Customer number</label>
            <div class="input-group">
              <input type="number" name="customer_number" class="form-control" placeholder="Customer number"
                value="<?php echo $customer_number . $costant; ?>" readonly>
              <small class="input-group-text"><i class="fas fa-user-cog"></i></small>
            </div>
          </div>
        </div>

        <div class="col-md-12 col-sm-4">
          <div class="form-group">
            <label for="">Customer Type Nnumber</label>
            <select class="custom-select" name="customer_type" id="">
              <?php
              $result = mysqli_query($conn, "SELECT customer_type_number, customer_type_name FROM customers_type");
             ?>
              <?php
             while($row =mysqli_fetch_assoc($result)){
             ?>
              <option disabled><?php echo $row['customer_type_name'];?></option>
              <option value="<?php echo $row['customer_type_number'];?>">
              <?php echo $row['customer_type_number'];?>
              </option>
              <?php }?>
            </select>
          </div>
        </div>

        <div class="col-md-6 col-sm-4">
          <div class="form-group">
            <label for="">First name</label>
            <input type="text" name="first_name" id="" class="form-control" placeholder="First name">
          </div>
        </div>

        <div class="col-md-6 col-sm-4">
          <div class="form-group">
            <label for="">Middle name</label>
            <input type="text" name="middle_name" id="" class="form-control" placeholder="Middle name">
          </div>
        </div>

        <div class="col-md-6 col-sm-4">
          <div class="form-group">
            <label for="">Surname</label>
            <input type="text" name="surname" id="" class="form-control" placeholder="Surname">
          </div>
        </div>

        <div class="col-md-6 col-sm-4">
          <div class="form-group">
            <label for="">Nationality</label>
            <select name="nationality" id="" class="form-control">
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
            <input type="date" name="date_of_birth" id="" class="form-control" placeholder="Date of birth">
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
          <button type="submit" class="btn btn-sm btn-primary" name="addcustomer">Register</button>
          <button type="reset" class="btn btn-sm btn-danger">Reset</button>
        </div>

      </div>
    </form>
    </main>
  </body>