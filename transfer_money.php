<?php

include('dbConnection.php');
session_start();

date_default_timezone_set('Asia/kolkata');
$currentTime = date('d-m-Y h:i:s A', time() );



if(isset($_POST['transfer'])) {

    $sender = $_POST["sender"];
    $reciever = $_POST["receiver"];
    $amount = $_POST["amount"];

    $sql = "SELECT * FROM customers_tb WHERE customers_account_no = $sender";
    $query = mysqli_query($conn, $sql);
    $sql1 = mysqli_fetch_array($query);

    $sql = "SELECT * FROM customers_tb WHERE customers_id = $reciever";
    $query = mysqli_query($conn, $sql);
    $sql2 = mysqli_fetch_array($query);

    //Conditions
    //For negative value
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Negative value cannot be transferred !")';
        echo '</script>';
    }
    //Insufficient balance
    else if($amount > $sql1['customers_current_balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Sorry! you have insufficient balance !")';
        echo '</script>';
    }
    //For 0 (zero) value
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Zero value cannot be transferred !')";
         echo "</script>";
     }

     else {
        $newbalance = $sql1['customers_current_balance'] - $amount;
        $sql = "UPDATE customers_tb set customers_current_balance=$newbalance where customers_account_no = $sender ";
        mysqli_query($conn,$sql);
     
        $newbalance = $sql2['customers_current_balance'] + $amount;
        $sql = "UPDATE customers_tb set customers_current_balance=$newbalance where customers_id = $reciever";
        mysqli_query($conn,$sql);
        
        $sender_name = $sql1['customers_name'];
        $receiver_name = $sql2['customers_name'];
        $sql = "INSERT INTO transaction_tb(`sender`, `receiver`, `balance`) VALUES ('$sender_name','$receiver_name','$amount')";
        $query=mysqli_query($conn,$sql);

        $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Yeaahhh!</strong> Tansfrer money successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';

        $newbalance= 0;
        $amount =0;
     }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking System</title>


    <!-- Bootstrape CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">

    <!-- Goggle Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">


</head>
<body>


<div style="margin-top: 200px;" class="container d-flex justify-content-center">
    <div class="col-md-5 shadow-lg p-4">
    <?php if(isset($msg)) {echo $msg;} ?>
        <form action="" method="POST">
        <?php
            $sid = $_GET['cid'];
            $query = "SELECT * FROM customers_tb WHERE customers_id  = $sid ";
            $query_rum = mysqli_query($conn,$query);

            foreach($query_rum as $row) { 
        ?>
            <div class="mb-3">
                <label class="form-label">Sender Account Number</label>
                <input type="text" class="form-control" placeholder="Account Number" name="sender" value="<?php echo $row['customers_account_no']; ?>" readonly>

                <input type="hidden" class="form-control" placeholder="Account Number" name="balance" value="<?php echo $row['customers_current_balance']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Reciever Account Number</label>
                <select name="receiver" class="form-select" required>
                <option value="" selected>Choose user....</option>
                <?php
                    $sid = $_GET['cid'];
                    $sql = "SELECT * FROM customers_tb WHERE customers_id!=$sid";
                    $result=mysqli_query($conn,$sql);
                    if(!$result)
                    {
                        echo "Error ".$sql."<br>".mysqli_error($conn);
                    }
                    while($rows = mysqli_fetch_assoc($result)) {
                ?>
                    <option value="<?php echo $rows['customers_id'];?>" >
                    
                        <?php echo $rows['customers_name'] ;?> (Balance: 
                        <?php echo $rows['customers_current_balance'] ;?> ) 
                
                    </option>
                <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="text" class="form-control" placeholder="Enter Amount to Transfer" id="amount" name="amount" required>
            </div>
            <button type="button"class="btn btn-primary"><a href="customer.php" style="text-decoration: none; color: #fff;">Go Back</a></button>
            <button type="submit" name="transfer" class="btn btn-success mx-2">Transfer</button>
        <?php } ?>
        </form>
    </div>
</div>




<!-- JavaScript -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>


</body>
</html>