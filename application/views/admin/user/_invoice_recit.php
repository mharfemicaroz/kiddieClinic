<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-world"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('invoice_recit') ?></h1>
            <small><?php echo display('invoice_recit') ?></small>

        </div>
    </section>


    <!-- Main content -->
    <section class="content">

        <?php
        $msg = $this->session->flashdata('message');
        if ($msg) {
            echo $msg;
        }
        ?>

        <?php
        $phone = $this->db->select('*')
            ->from('web_pages_tbl')
            ->where('name', 'phone')
            ->get()
            ->row();

        $email = $this->db->select('*')
            ->from('web_pages_tbl')
            ->where('name', 'email')
            ->get()
            ->row();

        $logo = $this->db->select('*')
            ->from('web_pages_tbl')
            ->where('name', 'logo')
            ->get()
            ->row();
        $address = $this->db->select('*')
            ->from('web_pages_tbl')
            ->where('name', 'address')
            ->get()
            ->row();

        $patient = $this->db->select('*')
            ->from('patient_tbl')
            ->where('patient_id', $invo->patient_id)
            ->get()
            ->row();

        ?>

        <div class="row">

            <div class="col-sm-12">
                <div class="panel panel-bd">
                    <div id="printableArea">
                        <div class="panel-body">
                            <table>
                                <tr>
                                    <td>
                                        <img src="<?php echo @$logo->picture; ?>" width="128px!important"
                                            height="128px!important" class="img img-responsive" alt=""
                                            style="margin-bottom:20px">
                                        <h1>Doki Jong's Kiddie Clinic</h1>
                                        <h3>(Herminegeldo H. Mangmang, Jr., M.D. DPPS.)</h3>
                                    </td>
                                    <td>
                                        <strong>Rivera Medical Center Incs</strong><br>
                                        Medical Arts Building<br>
                                        Panabo City<br>
                                        <strong>Clinic Hours:</strong><br>
                                        Mon, Tue, Wed, Fri<br>
                                        9:00am to 12:00 nn<br>
                                        Thursday:<br>
                                        2:00pm to 5:00pm<br>
                                        Clinic Number: 09335670738
                                    </td>
                                    <td>
                                        <strong>Good Shepherd Hospital</strong><br>
                                        Km. 31, National Highway<br>
                                        New Pandan, Panabo City<br>
                                        <strong>Clinic Hours:</strong><br>
                                        Mon, Tue, Wed, Fri, Sat: <br>
                                        2:00pm to 5:00pm
                                    </td>
                                    <td>
                                        <strong>Specialist Primary Care of Ilang, Inc</strong><br>
                                        KM. 17, Purok 19, Ilang<br>
                                        Davao City<br>
                                        <strong>Clinic Hours:</strong><br>
                                        Thursday:<br>
                                        10:00am to 2:00pm<br>
                                        Saturday: <br>
                                        10:00am to 2:00pm
                                    </td>
                                </tr>
                            </table>

                            <div class="row">
                                <comment>
                                    <div class="col-sm-8" style="display: inline-block;width: 64%">
                                        <div><?php echo display('invoice_no') ?>: <?php echo @$invo->invoice_id; ?>
                                        </div>
                                        <div class="m-b-15"><?php echo @$invo->date_time; ?></div>
                                    </div>
                                </comment>
                                <div class="col-sm-4 text-left" style="display: inline-block;margin-left: 5px;">



                                    <span
                                        class="label label-success-outline m-r-15"><?php echo display('billing_to') ?></span>

                                    <address style="margin-top:10px">
                                        <abbr> Patient Name:</abbr>
                                        <?php echo $patient->family_name . ', ' . $patient->given_name; ?><br>
                                        <abbr> <?php echo display('address') ?>:</abbr>
                                        <p style="width: 10px;margin: 0px;padding: 0px;">
                                            <?php echo $invo->address; ?>
                                        </p>
                                        <abbr> <?php echo display('phone_number') ?>:</abbr>
                                        <?php echo $invo->patient_phone; ?>
                                        <br>
                                        <abbr> <?php echo display('email') ?>:</abbr>
                                        <?php echo $invo->patient_email; ?>
                                    </address>
                                </div>
                            </div>
                            <hr>

                            <div class="table-responsive m-b-20">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th><?php echo display('sl_no') ?>.</th>
                                            <th><?php echo display('service_name') ?></th>
                                            <th><?php echo display('quantity') ?></th>
                                            <th><?php echo display('rate') ?></th>
                                            <th><?php echo display('discount') ?></th>
                                            <th><?php echo display('amount') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php
                                        $i = 1;
                                        foreach ($invo_product as $product) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td>
                                                    <div><strong><?php echo @$product->service_name; ?></strong></div>
                                                </td>
                                                <td><?php echo @$product->quantity; ?></td>
                                                <td><?php echo @$product->price; ?></td>
                                                <td><?php echo @$product->discount; ?></td>
                                                <td><?php echo @$product->grand_price; ?></td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="col-sm-8" style="display: inline-block;width: 66%">
                                        <p><?php echo $invo->payment_notes; ?></p>
                                        <p><strong>Thank you very much for choosing us.</strong></p>
                                    </div>

                                    <div class="col-sm-4" style="display: inline-block;">

                                        <table class="table">
                                            <tbody>

                                                <tr>
                                                    <th style="border-top: 0; border-bottom: 0;">
                                                        <?php echo display('tex') ?> :
                                                    </th>
                                                    <td style="border-top: 0; border-bottom: 0;">
                                                        <?php echo @$invo->total_tax; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="grand_total"><?php echo display('grand_total') ?> :</th>
                                                    <td class="grand_total"><?php echo $invo->grand_total; ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="insurance">Insurance :</th>
                                                    <td class="insurance">
                                                        <?php echo $invo->insurance_value . '(' . $invo->insurance . ')'; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="border-top: 0; border-bottom: 0;">
                                                        <?php echo display('paid_ammount') ?>:
                                                    </th>
                                                    <td style="border-top: 0; border-bottom: 0;">
                                                        <?php echo @$invo->paid; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th><?php echo display('due') ?> : </th>
                                                    <td><?php echo @$invo->due; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>


                                        <div
                                            style="float:left;width:90%;text-align:center;border-top:1px solid #000;margin-top: 100px;font-weight: bold;">
                                            <?php echo display('authorised_by') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-footer text-left">
                        <a class="btn btn-info" href="#" onclick="printContent('printableArea')"><span
                                class="fa fa-print"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<script type="text/javascript">
    //print a div
    function printContent(el) {
        var restorepage = $('body').html();
        var printcontent = $('#' + el).clone();
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);
        location.reload();
    }
</script>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        font-family: Arial, sans-serif;
        line-height: 1.6;
        background-color: #f2f2f2;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
        vertical-align: top;
    }

    th {
        background-color: #f2f2f2;
    }

    td {
        border-bottom: 1px solid #ddd;
    }

    h1,
    h3 {
        margin: 5px 0;
    }

    strong {
        font-weight: bold;
    }
</style>