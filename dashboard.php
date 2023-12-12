<?php
session_start();
require_once 'include/head.php'; 
require_once 'database/db_connection.php';
?>

<body>

  <?php require_once 'include/navbar.php'; ?>
<?php require_once 'include/sidebar.php'; ?>

  <!-- Main content -->
  
    <section class="content my-4 w-100">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <?php
            $sql = "SELECT count(*) AS total FROM customers_type";
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_assoc($result);
            ?>

            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $data['total']; ?></h3>

                <p>Customers type</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-cog"></i>
              </div>
              <a href="manage_customer_type.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
             <?php
              $sql = "SELECT count(*) AS total_account FROM account_type";
              $result = mysqli_query($conn, $sql);
              $data = mysqli_fetch_assoc($result);
              ?>
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $data['total_account'];?></h3>

                <p>Accounts types</p>
              </div>
              <div class="icon">
                <i class="fas fa-money-bill"></i>
              </div>
              <a href="manageaccount_type.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
             <?php
              $sql = "SELECT count(*) AS total_customer FROM customers";
              $result = mysqli_query($conn, $sql);
              $data = mysqli_fetch_assoc($result);
              ?>
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $data['total_customer'];?></h3>

                <p>Total Customers</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="managecustomer.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <?php
            $sql = "SELECT count(*) AS total_accounts FROM accounts";
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_assoc($result);
            ?>

            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $data['total_accounts'];?></h3>

                <p>Accounts</p>
              </div>
              <div class="icon">
                <i class="fas fa-user    "></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div>
    </section>
</body>
<?php require_once 'include/footer.php'; ?>