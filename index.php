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
                        <label for="">SC-NO</label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="scno" required>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="">Customer ID</label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="cuid" required>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="">Customer Full Name</label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="fname" required>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="">Date of meter Reading</label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="date" name="mdate" required>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="">Previous Reading</label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="number" name="pre_reading" required>
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
                        <label for="">Unit Consumed</label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="number" name="unit_consumed" required>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="">Demand Type</label>
                    </div>
                    <div class="col-md-9">
                        <select name="demand_type" id="demand_type" class="form-control">
                            <option value="5A">5A</option>
                            <option value="10A">10A</option>
                            <option value="15A">15A</option>
                            <option value="20A">20A</option>
                        </select>
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
                    <div class="col-md-3">
                        <label for="">FY</label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="fy">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="">Months</label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="months">
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