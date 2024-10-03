<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon"><i class="pe-7s-close"></i></div>
        <div class="header-title">
            <h1><?php echo display('create_prescription') ?></h1>
            <small><?php echo display('create_prescription') ?></small>
            <ol class="breadcrumb">
                <li class="active"><a
                        href="<?php echo base_url(); ?>admin/doctor/Dashboard"><?php echo display('deashbord'); ?></a>
                </li>
            </ol>
        </div>
    </section>

    <!-- Main content -->
    <div class="content">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <?php echo form_open('admin/doctor/Prescription_controller/save_prescription', array('target' => '_blank')); ?>
                <div class="panel panel-bd prescription-table">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo display('name') ?> :
                                <?php echo @$patient_info->family_name . ' ' . @$patient_info->given_name; ?>.
                                <?php echo display('phone_number') ?> : <?php echo @$patient_info->patient_phone; ?>,
                                <?php
                                $date1 = date_create(@$patient_info->birth_date);
                                $newDate = date_format($date1, "d-M-Y");
                                ?>
                                DOB : <?php echo @$newDate; ?>.
                                <?php echo display('sex') ?> : <?php echo @$patient_info->sex; ?>. Date :
                                <?php echo date("Y-m-d"); ?>
                            </h4>
                            <div class="text-right"><a
                                    href="<?php echo base_url() ?>History_controller/patient_medical_info/<?php echo @$patient_info->patient_id; ?>"
                                    class="btn btn-danger" target="_blank"><i class="ti-alert m-r-5"></i>Click to see
                                    patient info</a></div>
                        </div>
                    </div>

                    <input type="hidden" name="patient_id" value="<?php echo @$patient_info->patient_id; ?>">
                    <input type="hidden" name="appointment_id" value="<?php echo @$patient_info->appointment_id ?>">

                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-right">Complains
                                        :</label>
                                    <div class="col-sm-9 autocomplete-container">
                                        <input class="form-control" id="chief-complaint" type="text"
                                            name="chief_complain" oninput="showSuggestions(this.value)">
                                        <div id="suggestion-box" class="suggestions"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="prescription-select">
                            <div class="col-sm-12 col-md-12">
                                <h3>Checkup :</h3>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label text-right">Height(cm)
                                            :</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="number" min="0" id="height" name="height"
                                                value="<?php echo @$appointment_data->pt_height; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label text-right">Weight(kg)
                                            :</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="number" min="0" id="weight" name="weight"
                                                value="<?php echo @$appointment_data->pt_weight; ?>">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label text-right">Heart Rate(bpm)
                                            :</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="number" min="0" name="heartrate">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label text-right">Respiratory Rate(bpm)
                                            :</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="number" min="0" name="resprate">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label text-right">Temperature(°C)
                                            :</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="number" min="0" name="temperature"
                                                value="<?php echo @$appointment_data->pt_temperature; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label text-right">Body Mass Index(kg/m²)
                                            :</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" id="bmi" name="bmi">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="prescription-select">
                            <div class="row">


                                <div class="col-sm-6">
                                    <div class="form-group row"><label class="col-sm-4 col-form-label text-right">
                                            <h3><?php echo display('reference_diagnosis') ?> :</h3>
                                        </label>
                                        <div class="col-sm-8"><select name="disease" onchange="loadMedicine()"
                                                class="disease form-control" required id="speed2">
                                                <option selected="selected">--<?php echo display('disease') ?>--
                                                </option>
                                            </select></div>
                                    </div>
                                </div>


                                <div class="col-sm-12">
                                    <div class="row">

                                        <!-- <div class="col-sm-3">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-4 col-form-label text-right"><?php echo display('section') ?></label>
                                                <div class="col-sm-8">
                                                    <select name="section" required class="form-control section"
                                                        onchange="loadeDisease()" id="disease">
                                                        <option selected="selected">
                                                            --<?php echo display('section') ?>--
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> -->

                                        <!-- <div class="col-sm-3">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-4 col-form-label text-right"><?php echo display('disease') ?></label>
                                                <div class="col-sm-8">
                                                    <select name="disease" onchange="loadeCategory()"
                                                        class="disease form-control" required id="speed2">
                                                        <option selected="selected">
                                                            --<?php echo display('disease') ?>--
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> -->

                                        <!-- <div class="col-sm-3">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-4 col-form-label text-right"><?php echo display('category') ?></label>
                                                <div class="col-sm-8">
                                                    <select name="category" class="category form-control" id="speed3"
                                                        required onchange="loadeClasi()">
                                                        <option selected="selected">
                                                            --<?php echo display('category') ?>--
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> -->

                                        <!-- <div class="col-sm-3">
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label text-right">
                                                    <?php echo display('classification') ?></label>
                                                <div class="col-sm-7">
                                                    <select name="classific" onchange="loadMedicine()"
                                                        class="classific form-control" required id="classific">
                                                        <option selected="selected">
                                                            --<?php echo display('classification') ?>--</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> -->

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-height">
                            <div class="table-responsive">
                                <table id="one" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo display('medicine') ?></th>
                                            <th>Brand</th>
                                            <th>Sign</th>
                                            <th>Dosage</th>
                                        </tr>
                                    </thead>
                                    <tbody class="medicine_area">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <?php
                    // echo json_encode($harbs);
                    ?>
                    <div class="panel-footer">
                        <div class="table-responsive">
                            <div class="loder"></div>
                            <table id="two" class="table table-hover table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th><?php echo display('medicine') ?> <a href="javascript:void(0);"
                                                class="btn btn-success btn-xs m-l-10 addMedicine"><i
                                                    class="ti-plus m-r-5"></i>Add</a></th>
                                        <th>Brand</th>
                                        <th>Dosage</th>
                                        <th><?php echo display('comment') ?></th>
                                        <th><?php echo display('action') ?></th>
                                    </tr>
                                </thead>
                                <tbody class="harb field_wrapper">


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <!-- <div class="col-sm-6">
                                <div class="form-group row">
                                    <label
                                        class="col-sm-4 col-form-label text-right"><?php echo display('inspecsion') ?>
                                        :</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="inspecsion">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label text-right"><?php echo display('treatment') ?>
                                        :</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="treatment">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-sm-4 col-form-label text-right"><?php echo display('treatment_plan') ?>:</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="tretment_plan">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-sm-4 col-form-label text-right"><?php echo display('treatment_goals') ?>
                                        :</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="treatment_goals">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-sm-4 col-form-label text-right"><?php echo display('doctor_told') ?>
                                        :</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="doctor_told">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-sm-4 col-form-label text-right"><?php echo display('treatment_effect') ?>:</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="treatment_effect">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-sm-4 col-form-label text-right"><?php echo display('treatment_evaluation') ?>:</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="treatment_evaluation">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-sm-4 col-form-label text-right"><?php echo display('referral_doctor') ?>
                                        :</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="referral_doctor">
                                    </div>
                                </div>
                            </div> -->

                            <div class="col-sm-12">

                                <!-- <div class="form-group row">
                                    <label
                                        class="col-sm-4 col-form-label text-right"><?php echo display('work_injury_insurance') ?>
                                        :</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="work_injury">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-sm-4 col-form-label text-right"><?php echo display('traffic_accident') ?>
                                        :</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="traffic_accident">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label text-right">
                                        <?php echo display('version_number') ?> :</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="veteran_number">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-sm-4 col-form-label text-right"><?php echo display('custom_receipt') ?>
                                        :</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="custom_receipt">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-sm-4 col-form-label text-right"><?php echo display('deaggregate') ?>
                                        :</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="diagnostics">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-sm-4 col-form-label text-right"><?php echo display('additional_info') ?>
                                        :</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="additional_info">
                                    </div>
                                </div> -->

                                <div class="form-group row">
                                    <label
                                        class="col-sm-4 col-form-label text-right"><?php echo display('overall_comment') ?>
                                        :</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" name="overall_comment" rows="2"></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="panel-footer text-right">
                        <button type="reset" class="btn btn-primary"><?php echo display('reset') ?></button>
                        <button type="submit" class="btn btn-success"
                            onsubmit="saveComplaint(event)"><?php echo display('submit') ?></button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div> <!-- /.content -->
</div> <!-- /.content-wrapper -->




<script type="text/javascript">

    // load  
    function loadeSection() {
        var lang_id = $('#lang_id').val();
        if (lang_id != '') {
            $.ajax({
                'url': '<?php echo base_url(); ?>' + 'admin/Ajax_controller/lang_section/' + lang_id,
                'type': 'GET', //the way you want to send data to your URL
                'data': { 'lang_id': lang_id },
                'success': function (data) {

                    var container = $(".section");
                    if (data == 0) {
                        container.html("There is no lang_id");
                    } else {
                        container.html(data);

                    }
                }
            });
        };
    }

    // load  
    function loadeDisease() {
        var disease = $('#disease').val();
        if (disease != '') {
            $.ajax({
                'url': '<?php echo base_url(); ?>' + 'admin/Ajax_controller/load_disease/',
                'type': 'GET', //the way you want to send data to your URL
                'success': function (data) {

                    var container = $(".disease");
                    if (data == 0) {
                        container.html("There is no disease");
                    } else {
                        container.html(data);

                    }
                }
            });
        };
    }

    loadeDisease();


    // load  
    function loadeCategory() {
        var category = $('#speed2').val();

        if (category != '') {
            $.ajax({
                'url': '<?php echo base_url(); ?>' + 'admin/Ajax_controller/load_category/' + category,
                'type': 'GET', //the way you want to send data to your URL
                'data': { 'category': category },
                'success': function (data) {

                    var container = $(".category");
                    if (data == 0) {
                        container.html("There is no category");
                    } else {
                        container.html(data);

                    }
                }
            });
        };
    }


    // load  
    function loadeClasi() {
        var classific = $('#speed3').val();

        if (classific != '') {
            $.ajax({
                'url': '<?php echo base_url(); ?>' + 'admin/Ajax_controller/load_classification/' + classific,
                'type': 'GET', //the way you want to send data to your URL
                'data': { 'classific': classific },
                'success': function (data) {

                    var container = $(".classific");
                    if (data == 0) {
                        container.html("There is no classific");
                    } else {
                        container.html(data);

                    }
                }
            });
        };
    }


    // load medicine name
    function loadMedicine() {
        var med_id = $('#speed2').val();
        if (med_id != '') {
            $.ajax({
                'url': '<?php echo base_url(); ?>' + 'admin/Ajax_controller/load_madicine/' + med_id,
                'type': 'GET', //the way you want to send data to your URL
                'data': { 'med_id': med_id },
                'success': function (data) {

                    var container = $(".medicine_area");
                    if (data == 0) {
                        container.html("<div class='alert alert-danger'>There Is No Medicine</div>");
                    } else {
                        container.html(data);
                    }
                }
            });
        };
    }

    // load patient name
    function loadHarbs(medicine_id) {

        if (medicine_id != '') {
            $.ajax({
                'url': '<?php echo base_url(); ?>' + 'admin/Ajax_controller/load_madicine_harbs/' + medicine_id,
                'type': 'GET', //the way you want to send data to your URL
                'data': { 'medicine_id': medicine_id },
                'success': function (data) {
                    console.log(data)
                    var container = $("#two tbody");
                    if (data == 0) {
                        container.html("<?php echo display('patient_name_load_msg') ?>");
                    } else {
                        container.append(data);
                    }
                }
            });
        };
    }



    $(document).ready(function () {

        function calculateBMI() {
            // Get height and weight input values
            var height = parseFloat($('#height').val());
            var weight = parseFloat($('#weight').val());

            if (height > 0 && weight > 0) {
                // Convert height from cm to meters
                var heightInMeters = height / 100;
                // Calculate BMI
                var bmi = weight / (heightInMeters * heightInMeters);
                // Display the result rounded to 2 decimal places
                $('#bmi').val(bmi.toFixed(2));
            }
        }

        calculateBMI();

        // add row
        var maxField = 50;
        var addButton = $('.addMedicine');
        var wrapper = $('.field_wrapper');

        var x = 1;
        var counter = 2;

        $(addButton).on('click', function () {

            if (x < maxField) {
                var fieldHTML = '<tr>' +
                    '<th scope="row">' +
                    '<input class="form-control sajetion" id="92" name="medicine[]" autocomplete="off" placeholder="Enter Medicine" type="text">' +
                    '<div id="suggesstion-box"></div>' +
                    '</th>' +
                    '<td> <input class="form-control" name="brand[]"  id="tokenfield-typeahead' + x + '" type="text"></td>' +
                    '<td> <input class="form-control" name="dosage[]"  id="tokenfield-typeahead' + x + '" type="text"></td>' +
                    '<td><input type="text"  class="form-control" name="comment[]" id="tokenfield-typeahead' + x + '" value="" placeholder="Comment" /></td>' +
                    '<td>' +
                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm remove_button" type="button"><i class="ti-trash" aria-hidden="true"></i></a>' +
                    '</td>' +
                    '</tr>';
                x++;
                $(wrapper).append(fieldHTML);
            }
        });


        $('table').on('keyup', ".sajetion", function () {
            var output = $(this).next();

            var classific = document.getElementById('classific').value;
            var csrf_test_name = $("[name=csrf_test_name]").val();

            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>' + 'admin/Ajax_controller/medicine_harbs_saj/',
                data: { classific: classific, keyword: $(this).val(), csrf_test_name: csrf_test_name },
                success: function (data) {

                    $(output).html(data);
                }
            });
        });

        $('body').on('click', '.country-list > li', function () {
            var medicine_id = $(this).val();
            var target = $(this).parent().parent().parent().next().children();

            $.ajax({
                type: "GET",
                url: '<?php echo base_url(); ?>' + 'admin/Ajax_controller/herbs_get/',
                data: 'keyword=' + $(this).val(),
                success: function (data) {
                    target.val(data);
                }
            });


            var medicine = $(this).text();
            var target_val = $(this).parent().parent().prev().prev();
            var target_text = $(this).parent().parent().prev();

            $(target_val).val(medicine); //value passing
            $(target_text).val(medicine); //value passing

            $(this).parent().slideUp(300);
        });

        // remove row    
        $(wrapper).on('click', '.remove_button', function (e) {
            e.preventDefault();
            var row = $(this).parent('td').parent('tr');
            $(row).remove();
            x--;
        });


        var engine = new Bloodhound({

            local: [{ value: 'red' }, { value: 'blue' }, { value: 'green' }, { value: 'yellow' }, { value: 'violet' }, { value: 'brown' }, { value: 'purple' }, { value: 'black' }, { value: 'white' }],
            datumTokenizer: function (d) {
                return Bloodhound.tokenizers.whitespace(d.value);
            },
            queryTokenizer: Bloodhound.tokenizers.whitespace
        });

        engine.initialize();

        $('#tokenfield-typeahead1').tokenfield({
            typeahead: [null, { source: engine.ttAdapter() }]
        });

        $('#tokenfield-typeahead2').tokenfield({
            typeahead: [null, { source: engine.ttAdapter() }]
        });

        $('#tokenfield-typeahead3').tokenfield({
            typeahead: [null, { source: engine.ttAdapter() }]
        });

        $('#tokenfield-typeahead4').tokenfield({
            typeahead: [null, { source: engine.ttAdapter() }]
        });


    });

    //Load Suggestions 

    const diseases = [
        "Flu", "Cold", "COVID-19", "Stomach Ache", "Headache", "Diabetes",
        "Hypertension", "Asthma", "Allergy", "Arthritis", "Bronchitis", "Cancer",
        "Chickenpox", "Cholera", "Dengue", "Ebola", "Epilepsy", "Gastroenteritis",
        "Measles", "Mumps", "Rubella", "Whooping Cough", "Scarlet Fever", "Hand, Foot, and Mouth Disease",
        "RSV (Respiratory Syncytial Virus)", "Tonsillitis", "Ear Infection", "Croup", "Fifth Disease",
        "Impetigo", "Roseola", "Scabies", "Ringworm", "Conjunctivitis (Pink Eye)", "Tooth Decay",
        "Pinworms", "Cystic Fibrosis", "Jaundice", "Kawasaki Disease", "Otitis Media", "Sore Throat",
        "RSV Infection", "Heat Rash", "Eczema", "Anemia", "Molluscum Contagiosum", "Lyme Disease",
        "RSV Bronchiolitis", "Pharyngitis", "Glandular Fever", "Polio", "Rickets", "Urinary Tract Infection (UTI)"
    ];


    function getSavedComplaints() {
        const savedComplaints = localStorage.getItem('chiefComplaints');
        return savedComplaints ? JSON.parse(savedComplaints) : [];
    }

    function saveComplaint(event) {
        event.preventDefault();
        const complaintInput = document.getElementById('chief-complaint');
        const complaints = complaintInput.value.split(',').map(c => c.trim()).filter(c => c !== '');

        let savedComplaints = getSavedComplaints();
        complaints.forEach(complaint => {
            if (!savedComplaints.includes(complaint)) {
                savedComplaints.push(complaint);
            }
        });

        localStorage.setItem('chiefComplaints', JSON.stringify(savedComplaints));
        complaintInput.value = '';
        alert('Chief complaint(s) saved!');
    }

    function showSuggestions(value) {
        const suggestionBox = document.getElementById('suggestion-box');
        suggestionBox.innerHTML = '';

        // Get the last part of the input after the last comma
        const lastTerm = value.split(',').pop().trim();

        if (lastTerm.length === 0) {
            return;
        }

        const savedComplaints = getSavedComplaints();
        const allSuggestions = [...diseases, ...savedComplaints];

        const filteredSuggestions = allSuggestions.filter(item =>
            item.toLowerCase().includes(lastTerm.toLowerCase())
        );

        filteredSuggestions.forEach(suggestion => {
            const suggestionDiv = document.createElement('div');
            suggestionDiv.textContent = suggestion;
            suggestionDiv.addEventListener('click', function () {
                const currentInput = document.getElementById('chief-complaint').value;
                const parts = currentInput.split(',');
                parts.pop(); // Remove the last part that was being typed
                parts.push(suggestion); // Add the selected suggestion
                document.getElementById('chief-complaint').value = parts.join(', ');
                suggestionBox.innerHTML = '';
            });
            suggestionBox.appendChild(suggestionDiv);
        });
    }








</script>


<style>
    .autocomplete-container {
        position: relative;
        width: 800px;
    }

    .suggestions {
        border: 1px solid #ccc;
        border-top: none;
        max-height: 150px;
        overflow-y: auto;
        position: absolute;
        width: 100%;
        z-index: 1;
        background-color: #fff;
    }

    .suggestions div {
        padding: 10px;
        cursor: pointer;
    }

    .suggestions div:hover {
        background-color: #e0e0e0;
    }
</style>