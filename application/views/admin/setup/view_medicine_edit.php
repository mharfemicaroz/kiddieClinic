<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-world"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('edit_medicine'); ?></h1>
            <small><?php echo display('edit_medicine'); ?></small>
            <ol class="breadcrumb">

                <li class="active"><a
                        href="<?php echo base_url(); ?>admin/Dashboard"><?php echo display('deashbord'); ?></a>
                </li>
            </ol>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!--  form area -->
            <div class="col-sm-12">
                <div class="panel panel-bd">
                    <div class="panel-body">
                        <div class="portlet-body form">
                            <?php
                            $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'name' => 'em');
                            echo form_open_multipart('admin/Setup_controller/save_edit_medicine', $attributes);
                            ?>
                            <div class="form-body">


                                <div class="form-group">
                                    <label class="col-md-3 control-label"> Disease :</label>
                                    <div class="col-md-6">
                                        <select name="dis_name" class="form-control disease">
                                            <option>-- Disease--</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"> <?php echo display('medicine_name'); ?>
                                        :</label>
                                    <div class="col-md-6">
                                        <input type="text" value="<?php echo $med_info->medicine; ?>"
                                            name="medicine_name" class="form-control test"
                                            placeholder="<?php echo display('medicine_name'); ?>" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Brand :</label>
                                    <div class="col-md-6">
                                        <input type="text" value="<?php echo $med_info->brand; ?>" class="form-control"
                                            placeholder="Brand Name" name="brand" />

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Sign :</label>
                                    <div class="col-md-6">
                                        <input type="text" value="<?php echo $med_info->sign; ?>" class="form-control"
                                            placeholder="Description" name="sign" />

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Dosage :</label>
                                    <div class="col-md-6">
                                        <input type="text" value="<?php echo $med_info->dosage; ?>" class="form-control"
                                            placeholder="Dosage" name="dosage" />

                                    </div>
                                </div>


                                <input type="hidden" name="medicine_id" value="<?php echo $med_info->medicine_id; ?>">

                            </div>

                            <div class="text-center">
                                <input type="submit" class="btn btn-primary" value="<?php echo display('update'); ?>">
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<script>

    function loadDisease() {


        $.ajax({
            'url': '<?php echo base_url(); ?>' + 'admin/Ajax_controller/load_disease/',
            'type': 'GET', //the way you want to send data to your URL
            'success': function (data) {

                var container = $(".disease");
                if (data == 0) {
                    container.html("Empty list.");
                } else {
                    container.html(data);
                    document.forms['em'].elements['dis_name'].value = "<?php echo $med_info->disease_id; ?>";
                }
            }
        });

    }

    loadDisease();



</script>