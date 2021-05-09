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

<style>

th, td {
  text-align: center;
}

</style>

<body>


<div class="mx-4 shadow-lg p-4 mt-5 mb-5">
  <?php
   if(isset($_REQUEST['usersearch'])) {
    $name = $_REQUEST['name'];
    $number = $_REQUEST['number'];
    $query = "SELECT * FROM customers_tb WHERE customers_name LIKE '%$name%' AND customers_account_no LIKE '%$number%' ";
   } else {
    $query = "SELECT * FROM customers_tb";
    $name = "";
    $number = "";
    }
  $result = mysqli_query($conn, $query);
  ?> 
  
  <div class="form-group">
    <a class="btn btn-primary" href="index.php">Go Back</a>
  </div>
  <form action="" class="row g-3 justify-content-end" method="POST">
    <div class="form-group col-auto">
      <input type="text" class="form-control" name="name" value = "<?php echo $name ?>" placeholder="Enter Name">
    </div>
    <div class="form-group col-auto">
      <input type="text" class="form-control" name="number" value = "<?php echo $number ?>" placeholder="Enter Account Number">
    </div>
    <div class="form-group col-auto">
      <button type="submit" class="btn btn-success" name="usersearch"><i class="fas fa-search"></i></button>
    </div>
  </form><br>


      <div class="table-responsive">
        <p class="bg-dark text-white text-center p-2">All Customers</p>
          <table class="col-md-12 table table-striped table-bordered table-fixed">
            <thead>
              <tr>
                <th scope="col">Customer ID</th>
                <th scope="col">Customer Name</th> 
                <th scope="col">Customer Email</th>
                <th scope="col">Account Number</th>
                <th scope="col">Action</th>
              </tr>
            </thead>

            <tbody>
              <tr>

              <?php while ($row = mysqli_fetch_object($result)) { ?>
                  <td><?php echo $row->customers_id ?></td>
                  <td><?php echo $row->customers_name ?></td>
                  <td><?php echo $row->customers_email ?></td>
                  <td><?php echo $row->customers_account_no ?></td>
                  <td>
                    
                    <form action="view_customer.php?cid=<?php echo htmlentities($row->customers_id); ?>" method="POST" class="d-inline">
                      <input type="hidden" name="id" value="<?php echo $row->customers_id ?>">
                      <button class="btn btn-primary" name="view" value="View" type="submit"><i class="fas fa-users"></i> View Customers</button>
                    </form>

                    <form action="transfer_money.php?cid=<?php echo htmlentities($row->customers_id); ?>" method="POST" class="d-inline">
                      <input type="hidden" name="id" value="">
                      <button class="btn btn-warning" name="edit" value="edit" type="submit"><i class="fas fa-comments-dollar"></i> Transfer Money</button>
                    </form>

                    <form action="transaction_history.php?cid=<?php echo htmlentities($row->customers_name); ?>" method="POST" class="d-inline">
                      <input type="hidden" name="id" value="">
                      <button class="btn btn-success" name="history" value="history" type="submit"><i class="fas fa-folder-open"></i> Transaction History</button>
                    </form>

                  </td>
              </tr>
            <?php } ?>
          </tbody>          
        </table>
      </div> 
</div>



<!-- JavaScript -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>


</body>
</html>
