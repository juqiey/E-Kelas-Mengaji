<?
    require '../model/booking_function.php';

    $id=$_GET['id'];
    $pay=viewBooking($id)->fetch_assoc();
?>
<html>
    <head>
        <?
            $title="Bayaran";
            require '../global/header.php';
        ?>
        <style>
            body{
                background-color: #eee;
            }

            .container{
                height: 100vh;
            }

            .card{
                border:none;
            }

            .form-control {
                border-bottom: 2px solid #eee !important;
                border: none;
                font-weight: 600
            }

            .form-control:focus {
                color: #495057;
                background-color: #fff;
                border-color: #8bbafe;
                outline: 0;
                box-shadow: none;
                border-radius: 0px;
                border-bottom: 2px solid blue !important;
            }

            .inputbox {
                position: relative;
                margin-bottom: 20px;
                width: 100%
            }

            .inputbox span {
                position: absolute;
                top: 7px;
                left: 11px;
                transition: 0.5s
            }

            .inputbox i {
                position: absolute;
                top: 13px;
                right: 8px;
                transition: 0.5s;
                color: #3F51B5
            }

            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0
            }

            .inputbox input:focus~span {
                transform: translateX(-0px) translateY(-15px);
                font-size: 12px
            }

            .inputbox input:valid~span {
                transform: translateX(-0px) translateY(-15px);
                font-size: 12px
            }

            .card-blue{

                background-color: #492bc4;
            }

            .hightlight{

                background-color: #5737d9;
                padding: 10px;
                border-radius: 10px;
                margin-top: 15px;
                font-size: 14px;
            }

            .yellow{

                color: #fdcc49;
            }

            .decoration{

                text-decoration: none;
                font-size: 14px;
            }

            .btn-success {
                color: #fff;
                background-color: #492bc4;
                border-color:#492bc4;
            }

            .btn-success:hover {
                color: #fff;
                background-color:#492bc4;
                border-color: #492bc4;
            }

            .decoration:hover{

                text-decoration: none;
                color: #fdcc49;
            }
            .custom-select {
                position: relative;
                font-size: 16px;
                color: #495057;
            }

            /*.custom-select select {*/
            /*    display: none;*/
            /*}*/

            .select-selected {
                background-color: #fff;
                padding: 8px;
                border-radius: 4px;
                border: 1px solid #ced4da;
                cursor: pointer;
            }

            .select-selected:before {
                content: "";
                position: absolute;
                top: 50%;
                right: 10px;
                margin-top: -6px;
                border-width: 6px;
                border-style: solid;
                border-color: #888 transparent transparent transparent;
            }

            .select-items {
                display: none;
                position: absolute;
                background-color: #fff;
                border: 1px solid #ced4da;
                max-height: 120px;
                overflow-y: auto;
                z-index: 1;
            }

            .select-items div {
                padding: 8px;
                cursor: pointer;
                display: flex;
                align-items: center;
            }

            .select-items div:hover {
                background-color: #f1f1f1;
            }

            .disabled-input span {
                transform: translateX(-0px) translateY(-15px);
                font-size: 12px;
            }
        </style>
    </head>
    <body>
    <div class="container mt-5 px-5">
        <div class="mb-4">
            <h2>Bayaran</h2>
            <span>Sila pastikan segala butiran adalah benar sebelum melakukan pembayaran.</span>
        </div>
        <div class="row">
            <div class="col-md-8">
                <form method="post" action="../controller/payment_add_exec.php" enctype="multipart/form-data">
                    <div class="card p-3">
                        <h6 class="text-uppercase">Butiran Pembayar</h6>
                        <div class="inputbox mt-3"> <input value="<? echo $pay['studentname']; ?>" type="text" name="name" class="form-control" required="required"> <span>Nama</span> </div>
                        <div class="inputbox mt-3">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="custom-select">
                                        <select id="bankSelect" class="form-control" name="bank" required="required">
                                            <option value="" disabled selected>Pilih Bank</option>
                                            <? echo getDropdownBank(''); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Nombor Akaun" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <? $transactionid=generateBankTransactionId(); ?>
                                <span>ID Transaksi: <?php echo $transactionid; ?></span>
                                <!-- Hidden input here -->
                                <input type="hidden" name="transactionid" value="<?php echo $transactionid; ?>">
                                <input type="hidden" name="classfee" value="<? echo $pay['classfee'] ?>">
                                <input type="hidden" name="bookingid" value="<? echo $pay['bookingid'] ?>">
                            </div>
                        </div>
                        <div class="mt-4 mb-4">
                            <h6 class="text-uppercase">Butiran Penerima</h6>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="inputbox mt-3 mr-2 disabled-input"> <input value="<? echo $pay['teachername']; ?>" type="text" name="receiver_name" class="form-control" required="required" disabled> <span>Nama Penerima</span> </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="inputbox mt-3 mr-2 disabled-input"> <input value="<? echo $pay['teacherbank'] ?>" type="text" name="bank" class="form-control" required="required" disabled> <span>Bank</span> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="inputbox mt-3 mr-2 disabled-input"> <input value="<? echo $pay['teacheraccountno'];?>" type="text" name="account_number" class="form-control" required="required" disabled> <span>Nombor Akaun</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 mb-4 d-flex justify-content-between">
                        <button  onclick="history.back()" class="btn btn-dark px-3">Kembali</button>
                        <button type="submit" class="btn btn-success px-3">Bayar</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <div class="card card-blue p-3 text-white mb-3">
                    <span>Jumlah Bayaran:</span>
                    <div class="d-flex flex-row align-items-end mb-3">
                        <h1 class="mb-0 yellow">RM<? echo $pay['classfee']; ?></h1>
                    </div>
                    <span>Sila pastikan jumlah yang perlu dibayar adalah betul.</span>
                    <a href="#" class="yellow decoration">Sebarang kesilapan adalah tanggungjawab pengguna.</a>
                    <div class="hightlight">
                        <span>Terima kasih kerana menggunakan perkhidmatan ini.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?
        require '../global/script.php';
    ?>
    </body>
</html>