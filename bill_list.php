<?php
require "connection.php";
$sql = "select * from bill";
$result = mysqli_query($conn, $sql);

$bills = array();

while ($row = mysqli_fetch_assoc($result)) {
    $bills[] = $row;
}
?>
<html>
<head>
    <title>Home Page</title>
    <style>
        .error {
            color: red;
        }
    </style>
    <link rel="stylesheet" href="src/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div id="homepage" class="card" style="margin-top: 80px">
        <div class="card-header">
            <h3>Bill List Collection</h3>
            <a class="btn btn-sm btn-secondary" href="index.php">Bill Form</a>
        </div>
        <div class="card-body">
            <table class="table table-responsive table-striped">
                <thead>
                   <td>S.N</td>
                   <td>Customer Id</td>
                   <td>Date of Meter Reading</td>
                   <td>Current Reading</td>
                   <td>Previous Reading</td>
                   <td>Bill Amount</td>
                </thead>
                <tbody>
                <?php
                if (count($bills) > 0) {
                    for ($i = 0; $i < count($bills); $i++) {
                        ?>
                        <tr>
                            <td><?php echo $bills[$i]['id'] ?></td>
                            <td><?php echo $bills[$i]['customer_id'] ?></td>
                            <td><?php echo $bills[$i]['date_of_meter_reading'] ?></td>
                            <td><?php echo $bills[$i]['current_reading'] ?></td>
                            <td><?php echo $bills[$i]['previous_reading'] ?></td>
                            <td><?php echo $bills[$i]['bill_amount'] ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
</body>

<script type="text/JavaScript" src="src/js/bootstrap.min.js"></script>
<script type="text/JavaScript" src="src/js/jquery.min.js"></script>
<script src="src/js/jquery.validate.min.js"></script>

<script>

    const homepage = {
        init: function () {
            this.cacheDom();
            this.initPlugins();
        },

        cacheDom: function () {
            this.$homepage = $('#homepage');
        },

        initPlugins: function () {
            $('#billForm').validate({
                rules: {
                    customer_id: {required: true,},
                    demand_type: {required: true},
                    bill_amount: {required: true},
                    date_of_meter_reading: {required: true},
                },
                messages: {
                    customer_id: "Customer ID Is required",
                    date_of_meter_reading: "Select Date for meter reading",
                    demand_type: "Enter Demand type",
                    bill_amount: "Enter Bill Amount in NRS"
                }
            })
        },

    }
    homepage.init();

</script>
</html>