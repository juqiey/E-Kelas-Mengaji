<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <style>
       
    body {
    background: #dcdcdc;
}

.checkout-wrapper {
    padding-top: 40px;
    padding-bottom: 40px;
    background-color: #fafbfa;
}

.checkout {
    background-color: #fff;
    border: 1px solid #eaefe9;
    font-size: 14px;
}

.panel {
    margin-bottom: 0px;
}

.checkout-step {
    border-top: 1px solid #f2f2f2;
    color: #666;
    font-size: 14px;
    padding: 30px;
    position: relative;
}

.checkout-step-number {
    border-radius: 50%;
    border: 1px solid #666;
    display: inline-block;
    font-size: 12px;
    height: 32px;
    margin-right: 26px;
    padding: 6px;
    text-align: center;
    width: 32px;
}

.checkout-step-title {
    font-size: 18px;
    font-weight: 500;
    vertical-align: middle;
    display: inline-block;
    margin: 0px;
}

.checout-address-step {}

.checout-address-step .form-group {
    margin-bottom: 18px;
    display: inline-block;
    width: 100%;
}

.checkout-step-body {
    padding-left: 60px;
    padding-top: 30px;
}

.checkout-step-active {
    display: block;
}

.checkout-step-disabled {
    display: none;
}

.checkout-login {}

.login-phone {
    display: inline-block;
}

.login-phone:after {
    content: '+91 - ';
    font-size: 14px;
    left: 36px;
}

.login-phone:before {
    content: "";
    font-style: normal;
    color: #333;
    font-size: 18px;
    left: 12px;
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

.login-phone:after,
.login-phone:before {
    position: absolute;
    top: 50%;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
}

.login-phone .form-control {
    padding-left: 68px;
    font-size: 14px;
}

.checkout-login .btn {
    height: 42px;
    line-height: 1.8;
}

.otp-verifaction {
    margin-top: 30px;
}

.checkout-sidebar {
    background-color: #fff;
    border: 1px solid #eaefe9;
    padding: 30px;
    margin-bottom: 30px;
}

.checkout-sidebar-merchant-box {
    background-color: #fff;
    border: 1px solid #eaefe9;
    margin-bottom: 30px;
}

.checkout-total {
    border-bottom: 1px solid #eaefe9;
    padding-bottom: 10px;
    margin-bottom: 10px;
}

.checkout-invoice {
    display: inline-block;
    width: 100%;
}

.checout-invoice-title {
    float: left;
    color: #30322f;
}

.checout-invoice-price {
    float: right;
    color: #30322f;
}

.checkout-charges {
    display: inline-block;
    width: 100%;
}

.checout-charges-title {
    float: left;
}

.checout-charges-price {
    float: right;
}

.charges-free {
    color: #43b02a;
    font-weight: 600;
}

.checkout-payable {
    display: inline-block;
    width: 100%;
    color: #333;
}

.checkout-payable-title {
    float: left;
}

.checkout-payable-price {
    float: right;
}

.checkout-cart-merchant-box {
    padding: 20px;
    display: inline-block;
    width: 100%;
    border-bottom: 1px solid #eaefe9;
    padding-bottom: 20px;
}

.checkout-cart-merchant-name {
    color: #30322f;
    float: left;
}

.checkout-cart-merchant-item {
    float: right;
    color: #30322f;
}

.checkout-cart-products {}

.checkout-cart-products .checkout-charges {
    padding: 10px 20px;
    color: #333;
}

.checkout-cart-item {
    border-bottom: 1px solid #eaefe9;
    box-sizing: border-box;
    display: table;
    font-size: 12px;
    padding: 22px 20px;
    width: 100%;
}

.checkout-item-list {}

.checkout-item-count {
    float: left;
}

.checkout-item-img {
    width: 60px;
    float: left;
}

.checkout-item-name-box {
    float: left;
}

.checkout-item-title {
    color: #30322f;
    font-size: 14px;
}

.checkout-item-unit {}

.checkout-item-price {
    float: right;
    color: #30322f;
    font-size: 14px;
    font-weight: 600;
}

.checkout-viewmore-btn {
    padding: 10px;
    text-align: center;
}

.header-checkout-item {
    text-align: right;
    padding-top: 20px;
}

.checkout-promise-item {
    background-repeat: no-repeat;
    background-size: 14px;
    display: inline-block;
    margin-left: 20px;
    padding-left: 24px;
    color: #30322f;
}

.checkout-promise-item i {
    padding-right: 10px;
    color: #43b02a;
}
Similar snip
    </style>
   
</head>

<body>
    <div class="container mt-5">
        <div class="row">
        <div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div id="accordion" class="checkout">
                <div class="panel checkout-step">
                    <div> <span class="checkout-step-number">1</span>
                        <h4 class="checkout-step-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" > Phone Number Verification</a></h4>
                    </div>
                    <div id="collapseOne" class="collapse in">
                        <div class="checkout-step-body">
                            <p>We need your phone number so that we can update you about your order.</p>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="checkout-login">
                                        <form>
                                            <div class="login-phone">
                                                <input type="text" class="form-control" placeholder="Phone Number">
                                            </div>
                                            <a class="btn btn-default " role="button" data-toggle="collapse" href="#otp-verifaction">Next</a>
                                            <!-- add class disabled to inactive button -->
                                        </form>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                            </div>
                            <div class="collapse" id="otp-verifaction">
                                <div class="otp-verifaction">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="col-md-12 control-label sr-only" for="Phone">Phone</label>
                                                    <div class="col-md-3">
                                                        <input id="number" name="number" type="text" placeholder="0" class="form-control input-md" required="">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input id="number" name="number" type="text" placeholder="0" class="form-control input-md" required="">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input id="number" name="number" type="text" placeholder="0" class="form-control input-md" required="">
                                                    </div>
                                                    <div class="col-md-3 ">
                                                        <input id="number" name="number" type="text" placeholder="0" class="form-control input-md" required="">
                                                    </div>
                                                </div>
                                                <!-- Button -->
                                                <div class="form-group">
                                                    <label class="control-label sr-only" for="next">next</label>
                                                    <div class="col-md-12">
                                                        <a class="collapsed btn btn-default" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Next</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel checkout-step">
                    <div role="tab" id="headingTwo"> <span class="checkout-step-number">2</span>
                        <h4 class="checkout-step-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" > Delivery Address </a> </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="checkout-step-body">
                            <div class="checout-address-step">
                                <div class="row">
                                    <form class="">
                                        <!-- Multiple Radios (inline) -->
                                        <div class="form-group">
                                            <label class="col-md-12 control-label" for="address"></label>
                                            <div class="col-md-12 ">
                                                <label class="radio-inline" for="address-0">
                                                    <input type="radio" name="address" id="address-0" value="Home" checked="checked"> Home </label>
                                                <label class="radio-inline" for="address-1">
                                                    <input type="radio" name="address" id="address-1" value="Office"> Office </label>
                                                <label class="radio-inline" for="address-2">
                                                    <input type="radio" name="address" id="address-2" value="Other"> Other </label>
                                            </div>
                                        </div>
                                        <!-- Text input-->
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label" for="name">Name</label>
                                                <input id="name" name="name" type="text" placeholder="Name" class="form-control input-md" required="">
                                            </div>
                                        </div>
                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-md-12 control-label" for="flat">Flat / House / Office No.</label>
                                            <div class="col-md-12">
                                                <input id="flat" name="flat" type="text" placeholder="address" class="form-control input-md" required="">
                                            </div>
                                        </div>
                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-md-12 control-label" for="street">Street / Society / Office Name</label>
                                            <div class="col-md-12">
                                                <input id="street" name="street" type="text" placeholder="Street Address" class="form-control input-md">
                                            </div>
                                        </div>
                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-md-12 control-label" for="Locality">Locality</label>
                                            <div class="col-md-12">
                                                <input id="Locality" name="Locality" type="text" placeholder="Ahmedabad" class="form-control input-md" required="">
                                            </div>
                                        </div>
                                        <!-- Button -->
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button id="singlebutton" name="singlebutton" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <a class="collapsed btn btn-default" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"> Next </a>
                        </div>
                    </div>
                </div>
                <div class="panel checkout-step">
                    <div role="tab" id="headingThree"> <span class="checkout-step-number">3</span>
                        <h4 class="checkout-step-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"  > Time & Date </a> </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="checkout-step-body">
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="time">Time</label>
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label for="time-0">
                                                <input type="radio" name="time" id="time-0" value="8:00 - 9:00" checked="checked"> 8:00 - 9:00 </label>
                                        </div>
                                        <div class="radio">
                                            <label for="time-1">
                                                <input type="radio" name="time" id="time-1" value="10:00 - 11:00"> 10:00 - 11:00 </label>
                                        </div>
                                        <div class="radio">
                                            <label for="time-2">
                                                <input type="radio" name="time" id="time-2" value="12:00 - 1:00"> 12:00 - 1:00 </label>
                                        </div>
                                        <div class="radio">
                                            <label for="time-3">
                                                <input type="radio" name="time" id="time-3" value="1:00 - 2:00"> 1:00 - 2:00 </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="collapsed btn btn-default" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour"> Next </a>
                        </div>
                    </div>
                </div>
                <div class="panel checkout-step">
                    <div role="tab" id="headingFour"> <span class="checkout-step-number">4</span>
                        <h4 class="checkout-step-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour"  > Payment </a> </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse">
                        <div class="checkout-step-body">
                            Payment Mode
                            <a href="#" class="btn btn-default">Proccess to payment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        </div>
    </div>
</body>

</html>
