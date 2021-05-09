<?php
include('dbConnection.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Customers</title>


    <!-- Bootstrape CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">

    <!-- Goggle Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">


</head>

<body>


<div class="mx-4 shadow-lg p-4 mt-5 mb-5">
  <div class="mx-5 mt-5 text-center">
  
  <div class="form-group mb-2">
    <a class="btn btn-primary" href="customer.php">Go Back</a>
  </div>


      <div class="table-responsive">
        <p class="bg-dark text-white text-center p-2">Customer Details</p>
          <table class="col-md-12 table table-striped table-bordered table-fixed">
            <thead>
              <tr>
                <th scope="col">Customer ID</th>
                <th scope="col">Customer Name</th> 
                <th scope="col">Customer Email</th>
                <th scope="col">Account Number</th>
                <th scope="col">Account Balance</th>
              </tr>
            </thead>

            <tbody>
              <tr>

              <?php
              
              $sid = $_GET['cid'];
                $sql = "SELECT * FROM customers_tb WHERE customers_id = '$sid' ";
                $query_rum = mysqli_query($conn,$sql);
              
                foreach($query_rum as $row) { ?>
                  <td><?php echo $row['customers_id']; ?></td>
                  <td><?php echo $row['customers_name']; ?></td>
                  <td><?php echo $row['customers_email']; ?></td>
                  <td><?php echo $row['customers_account_no']; ?></td>
                  <td><?php echo $row['customers_current_balance']; ?></td>
              </tr>
            <?php } ?>
          </tbody>          
        </table>
      </div> 
  </div>
</div>



<!-- JavaScript -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>


</body>
</html>
