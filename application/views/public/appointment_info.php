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

$timezone = $this->db->select('*')
    ->from('web_pages_tbl')
    ->where('name', 'timezone')
    ->get()
    ->row();
$google_map = $this->db->select('*')
    ->from('web_pages_tbl')
    ->where('name', 'google_map')
    ->get()
    ->row();
date_default_timezone_set(@$timezone->details);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> information </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>extra/prescription/css/bootstrap.min.css" rel="stylesheet">

    <!-- flaticon -->
    <link href="<?php echo base_url(); ?>extra/prescription/css/flaticon.css" rel="stylesheet">
    <!-- font-awesome -->
    <link href="<?php echo base_url(); ?>extra/prescription/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- style -->
    <link href="<?php echo base_url(); ?>extra/prescription/css/style.css" rel="stylesheet">
    <!--gogole fonts-->
    <link
        href='https://fonts.googleapis.com/css?family=Open+Sans:400,800,700,800italic,600,400italic,300italic,600italic,700italic,300|Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <link
        href='https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700|Raleway:400,100,100italic,200,300,200italic,300italic,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic'
        rel='stylesheet' type='text/css'>

    <style type="text/css">
        /*map*/
        .google_map>iframe {
            width: 350px !important;
            height: 350px !important;
        }

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
</head>

<body>

    <div id="PrintMe">
        <div class="container">
            <div class="row top-bar">
                <div class="left-text pull-left">
                    <p><b><?php echo display('date') ?> : <?php echo @$print->get_date_time; ?></p>
                </div>

                <div class="social-icons pull-right">
                    <ul>
                        <li><a href="" onclick="printContent('PrintMe')" title="Print"><i class="fa fa-print"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container header">

            <table>
                <tr>
                    <td>
                        <img src="<?php echo @$logo->picture; ?>" width="128px!important" height="128px!important"
                            class="img img-responsive" alt="" style="margin-bottom:20px">
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


        </div>
        <section>
            <div class="container">
                <div class="row information">
                    <div class="sec-title colored text-center">
                        <h2>Patient Information</h2>
                        <span class="decor">
                            <span class="inner"></span>
                        </span>
                    </div>
                    <div class="col-sm-6">
                        <div class="information-details">
                            <ul>
                                <li>Name :<span
                                        class="pull-right"><?php echo @$print->family_name . ' ' . @$print->given_name; ?></span>
                                </li>
                                <li>Appointment Id :<span
                                        class="pull-right"><?php echo $print->appointment_id; ?></span>
                                </li>
                                <li>Patient Id :<span class="pull-right"><?php echo $print->patient_id; ?></span></li>
                                <li>Height :<span class="pull-right"><?php echo $print->pt_height; ?>cm</span></li>
                                <li>Weight :<span class="pull-right"><?php echo $print->pt_weight; ?>kg</span></li>
                                <li>Temperature :<span class="pull-right"><?php echo $print->pt_temperature; ?>℃</span>
                                </li>
                                <li>Date :<span class="pull-right"><?php echo $print->get_date_time; ?></span></li>
                                <li>Time :<span class="pull-right"><?php echo $print->sequence; ?></span></li>
                                <li>Doctor :<span class="pull-right"><?php echo $print->doctor_name; ?></span></li>
                                <li>Department :<span class="pull-right"><?php echo $print->department; ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="google_map">
                            <?php echo $google_map->details; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div class="container">
            <div class="row footer">
                <p></p>
            </div>
        </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url(); ?>extra/prescription/js/bootstrap.min.js"></script>


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
</body>

</html>