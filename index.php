<?php
require "connection.php";
$sql = "select * from customer";
$result = mysqli_query($conn, $sql);

$users = array();

while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
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
            <h3>Bill Form Collection</h3>
            <a class="btn btn-sm btn-secondary" href="bill_list.php">Bill List</a>
        </div>
        <div class="card-body">
            <form action="bill_post.php" id="billForm" method="post">
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="">Customer Full Name</label>
                    </div>

                    <div class="col-md-9">
                        <select name="customer_id" id="customer_id" class="form-control">
                            <?php
                            if (count($users) > 0) {
                                for ($i = 0; $i < count($users); $i++) {
                                    ?>
                                    <option value="<?php echo $users[$i]['id'] ?>"><?php echo $users[$i]['full_name'] ?></option>
                                    <?php
                                }
                            }
                            ?>

                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="">Date of meter Reading</label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="date" name="date_of_meter_reading" required>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="">Current Reading</label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="number" name="current_reading" required>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="">Demand Type</label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="demand_type" required>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="">Previous Reading</label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="number" name="previous_reading" required>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="">Bill Amount</label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="number" name="bill_amount">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-10"></div>
                    <div class="col-md-2">
                        <input type="submit" value="Submit" class="btn btn-primary ">
                    </div>
                </div>

            </form>
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