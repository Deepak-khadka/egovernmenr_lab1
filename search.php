<?php

require "connection.php";
$scNo = $_POST['search'];
$sql = "select * from bill_info where scno like '%$scNo%'";
$result = mysqli_query($conn, $sql);

$bills = array();

while ($row = mysqli_fetch_assoc($result)) {
    $bills[] = $row;
}

if (isset($bills)) {
    for ($i = 0; $i < count($bills); $i++) {
        echo ""
        ?>
        <tr>
            <td><?php echo $bills[$i]['scno'] ?></td>
            <td><?php echo $bills[$i]['cuid'] ?></td>
            <td><?php echo $bills[$i]['fname'] ?></td>
            <td><?php echo $bills[$i]['mdate'] ?></td>
            <td><?php echo $bills[$i]['pre_reading'] ?></td>
            <td><?php echo $bills[$i]['current_reading'] ?></td>
            <td><?php echo $bills[$i]['unit_consumed'] ?></td>
            <td><?php echo $bills[$i]['demand_type'] ?></td>
            <td><?php echo $bills[$i]['bill_amount'] ?></td>
            <td><?php echo $bills[$i]['fy'] ?></td>
            <td><?php echo $bills[$i]['months'] ?></td>
        </tr>
        <?php
    }
}

?>