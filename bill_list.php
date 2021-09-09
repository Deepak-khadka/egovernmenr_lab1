<?php
require "connection.php";
$sql = "select * from bill_info";
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
            <div class="row">
                <div class="col-4 offset-8">
                    <input type="text" name="search" placeholder="Search by SCNO" class="form-control search">
                </div>
            </div>
            <br>
            <table class="table table-responsive table-striped">
                <tr>
                   <th>SC-NO</th>
                   <th>CUS-ID</th>
                   <th>Customer Full Name</th>
                   <th>Date of Meter Reading</th>
                   <th>Previous Reading</th>
                   <th>Current Reading</th>
                   <th>Unit Consumed</th>
                   <th>Demand Type</th>
                   <th>Bill Amount</th>
                   <th>FYt</th>
                   <th>Months</th>
                </tr>
                <tbody class="table-body">
                <?php
                if (count($bills) > 0) {
                    for ($i = 0; $i < count($bills); $i++) {
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
            this.bind();
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

        bind:function () {
            this.$homepage.on('keyup', '.search', this.searchData);
        },

        searchData: function () {
            $.ajax({
                url: "search.php",
                type: "post",
                data: {
                    search : this.value
                },
                success: function (response) {
                    $('.table-body').html("").append(response);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }

    }
    homepage.init();

</script>
</html>