<?php
$phone = $this->db->select('*')
    ->from('web_pages_tbl')
    ->where('name', 'phone')
    ->get()
    ->row();

$logo = $this->db->select('*')
    ->from('web_pages_tbl')
    ->where('name', 'logo')
    ->get()
    ->row();

$email = $this->db->select('*')
    ->from('web_pages_tbl')
    ->where('name', 'email')
    ->get()
    ->row();
$timezone = $this->db->select('*')
    ->from('web_pages_tbl')
    ->where('name', 'timezone')
    ->get()
    ->row();
date_default_timezone_set(@$timezone->details);
?>

<?php
//print_r($prescription);
@$js_data = json_decode($prescription->data);
@$medicine_data = (array) $js_data->medicine_data;
@$height = $js_data->height;
@$weight = $js_data->weight;
@$heartrate = $js_data->heartrate;
@$resprate = $js_data->resprate;
@$temperature = $js_data->temperature;
@$bmi = $js_data->bmi;

?>

<div id="dif_p" class="container">
    <div class="row">
        <div class="social-icons pull-right">
            <label class="radio-inline btn btn btn-primary" id="pad"><?php echo display('pad_print'); ?></label>
            <ul>
                <li style="background: green;"><a href="" onclick="printContent('div1')" title="Print"><i
                            class="fa fa-print"></i></a></li>
            </ul>
        </div>
    </div>
</div>

<div id="div1">
    <div class="container">
        <div class="row top-bar" style="border-bottom: 7px double #EAEAEA;">
            <div class="left-text pull-left">
                <p>
                    <b><?php echo display('date'); ?> :</b>
                    <?php
                    $date1 = date_create(@$value->create_date_time);
                    echo $newDate = date_format($date1, "d-M-Y h:i:sa l");
                    ?>
                </p>
            </div>
            <div class="social-icons pull-right">

            </div>
        </div>
    </div>

    <div class="container header" style="padding: 30px 20px;">

        <table>
            <tr>
                <td style="vertical-align: top; text-align: left;">
                    <img src="<?php echo @$logo->picture; ?>" width="128px!important" height="128px!important"
                        class="img img-responsive" alt="" style="margin-bottom:20px">
                    <h1>Doki Jong's Kiddie Clinic</h1>
                    <h3>(Herminegeldo H. Mangmang, Jr., M.D. DPPS.)</h3>
                </td>
                <td style="vertical-align: top; text-align: left;">
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
                <td style="vertical-align: top; text-align: left;">
                    <strong>Good Shepherd Hospital</strong><br>
                    Km. 31, National Highway<br>
                    New Pandan, Panabo City<br>
                    <strong>Clinic Hours:</strong><br>
                    Mon, Tue, Wed, Fri, Sat:<br>
                    2:00pm to 5:00pm
                </td>
                <td style="vertical-align: top; text-align: left;">
                    <strong>Specialist Primary Care of Ilang, Inc</strong><br>
                    KM. 17, Purok 19, Ilang<br>
                    Davao City<br>
                    <strong>Clinic Hours:</strong><br>
                    Thursday:<br>
                    10:00am to 2:00pm<br>
                    Saturday:<br>
                    10:00am to 2:00pm
                </td>
            </tr>
        </table>


        <!-- <div class="logo pull-left">

            <h4><?php echo @$doctor->doctor_name; ?></h4>
            <?php echo @$doctor->degrees; ?><br>
            <b><?php echo @$doctor->specialist; ?></b><br>
            <?php echo @$doctor->designation; ?><br>
            <b><?php echo @$doctor->service_place; ?></b>
        </div>
        <div class="header-right-info pull-right clearfix">
            <div class="single-header-info" style="padding-top: 16px;">
                <div class="icon-box">
                    <div class="inner-box">
                        <i class="flaticon-interface"></i>
                    </div>
                </div>
                <div class="content">
                    <h3>EMAIL</h3>
                    <p><?php echo @$email->details; ?></p>
                </div>
            </div>
            <div class="single-header-info" style="padding-top: 16px;">
                <div class="icon-box">
                    <div class="inner-box">
                        <i class="flaticon-telephone"></i>
                    </div>
                </div>
                <div class="content">
                    <h3>Call Now</h3>
                    <p><b> <?php echo @$phone->details; ?></b></p>
                </div>
            </div>
        </div> -->


    </div>
    <section>
        <div class="container">
            <div class="row details-content">
                <div class="patient-details text-center">
                    <h3>Name: <?php echo @$patient->family_name . ' ' . @$patient->given_name; ?>,
                        &nbsp;Age:
                        <?php
                        $date1 = date_create(@$patient->birth_date);
                        $date2 = date_create(date('y-m-d'));
                        $diff = date_diff($date1, $date2);
                        echo @$diff->format("%Y-Y:%m-M:%d-D");
                        ?>,
                        &nbsp;Sex: <?php echo @$patient->sex; ?>,
                        &nbsp;Patient ID: <?php echo @$patient->patient_id; ?>
                    </h3>
                    <h3>
                        Height:<?php echo @$height; ?>cm&nbsp;Weight:<?php echo @$weight; ?>kg&nbsp;Temperature:<?php echo @$temperature; ?>°C
                    </h3>
                </div>

                <div class="col-sm-12">
                    <div class="table-responsive marg">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Medicine</th>

                                    <th>Brand</th>

                                    <th>Dosage</th>

                                    <th>Comment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($medicine_data['medicine'] as $key => $val) { ?>
                                    <tr>
                                        <td><?php echo @$val->medicine; ?></td>

                                        <td><?php echo @$val->brand; ?></td>

                                        <td><?php echo @$val->dosage; ?></td>

                                        <td><?php echo @$val->comment; ?></td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-center"><?php echo @$js_data->overall_comment; ?></a>.
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div itemscope="" itemtype="" class="grid-one-fourth attributionBlock">
                        <p id="signature"><?php echo display('Signature'); ?>_________________________</p>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <div class="container">
        <div class="row footer" style="border-top: 7px double #EAEAEA;">
            <p> </p>
        </div>
    </div>

</div>