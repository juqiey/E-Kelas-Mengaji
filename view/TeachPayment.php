<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payments</title>
    <style>
        body {
            background: #f5f5f5;
            margin-top: 20px;
        }

        .card {
            border: none;
            -webkit-box-shadow: 1px 0 20px rgba(96, 93, 175, .05);
            box-shadow: 1px 0 20px rgba(96, 93, 175, .05);
            margin-bottom: 30px;
        }

        .table th {
            font-weight: 500;
            color: #fff; /* Changing text color to white */
        }

        .table thead {
            background-color: #3f51b5; /* Changing table header background color to blue */
            color: #fff; /* Changing text color to white */
        }

        .table>tbody>tr>td,
        .table>tfoot>tr>td,
        .table>thead>tr>td {
            padding: 14px 12px;
            vertical-align: middle;
        }

        .table tr td {
            color: #8887a9;
        }

        .thumb-sm {
            height: 32px;
            width: 32px;
        }

        .badge-soft-warning {
            background-color: rgba(248, 201, 85, .2);
            color: #f8c955;
        }

        .badge {
            font-weight: 500;
        }

        .badge-soft-primary {
            background-color: rgba(96, 93, 175, .2);
            color: #605daf;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="header-title pb-3 mt-0">Payments</h5>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr class="align-self-center">
                                        <th>Project Name</th>
                                        <th>Client Name</th>
                                        <th>Payment Type</th>
                                        <th>Paid Date</th>
                                        <th>Amount</th>
                                        <th>Transaction</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Product Development</td>
                                        <td><img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="thumb-sm rounded-circle mr-2"> Kevin Heal</td>
                                        <td>Paypal</td>
                                        <td>5/8/2018</td>
                                        <td>$15,000</td>
                                        <td><span class="badge badge-boxed badge-soft-warning">Pending</span></td>
                                    </tr>
                                    <!-- More table rows here -->
                                    <!-- ... -->
                                </tbody>
                            </table>
                        </div>
                        <!--end table-responsive-->
                        <div class="pt-3 border-top text-right"><a href="#" class="text-primary">View all <i class="mdi mdi-arrow-right"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
