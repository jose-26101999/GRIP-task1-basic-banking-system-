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
        <p class="bg-dark text-white text-center p-2">Transaction History</p>
          <table class="col-md-12 table table-striped table-bordered table-fixed">
            <thead>
              <tr>
                <th scope="col">Transaction ID</th>
                <th scope="col">Sender Name</th> 
                <th scope="col">Receiver Email</th>
                <th scope="col">Amount Transfered</th>
                <th scope="col">Date & Time</th>
              </tr>
            </thead>

            <tbody>
              <tr>

              <?php
              
              $sid = $_GET['cid'];
                $sql = "SELECT * FROM transaction_tb WHERE sender = '$sid' ";
                $result = mysqli_query($conn,$sql);

                if($result->num_rows > 0) {
             
                while ($row = mysqli_fetch_object($result)) { ?>
                  <td><?php echo $row->transaction_id ?></td>
                  <td><?php echo $row->sender ?></td>
                  <td><?php echo $row->receiver ?></td>
                  <td><?php echo $row->balance ?></td>
                  <td><?php echo $row->date_time ?></td>
              </tr>
            <?php }
            
              } else {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Ohhhh!</strong> No transaction has been made yet!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
              }
            
            ?>
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
