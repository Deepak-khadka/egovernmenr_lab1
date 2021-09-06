<?php
 require('connection.php');
 $customer_id = $_POST['customer_id'];
 $date_of_meter_reading = $_POST['date_of_meter_reading'];
 $current_reading = $_POST['current_reading'];
 $demand_type = $_POST['demand_type'];
 $previous_reading = $_POST['previous_reading'];
 $bill_amount = $_POST['bill_amount'];

  $sql = "INSERT INTO bill(customer_id, date_of_meter_reading,current_reading,demand_type,previous_reading,bill_amount) VALUE ('$customer_id','$date_of_meter_reading','$current_reading','$demand_type','$previous_reading','$bill_amount')";

  $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

  echo "Thank you ";
?>

<a href="index.php">Click here to go back</a>
