<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-world"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('medicine_list'); ?></h1>
            <small><?php echo display('medicine_list'); ?></small>
            <ol class="breadcrumb">
                <li class="active"><a
                        href="<?php echo base_url(); ?>admin/doctor/Dashboard"><?php echo display('deashbord'); ?></a>
                </li>
            </ol>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php
                $msg = $this->session->flashdata('message');
                if ($msg) {
                    echo $msg;
                }
                ?>
                <div class="panel panel-bd">
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                            <thead>
                                <tr class="center">
                                    <th class="all">Disease</th>
                                    <th class="all"><?php echo display('medicine_name'); ?></th>
                                    <th class="all">Brand</th>
                                    <th class="all">Sign</th>
                                    <th class="all">Dosage</th>
                                    <th class="all"><?php echo display('action'); ?> </th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($medicine as $value) {
                                    ?>
                                    <tr>
                                        <td><?php echo $value->disease_name; ?></td>
                                        <td><?php echo $value->medicine; ?></td>
                                        <td><?php echo $value->brand; ?></td>
                                        <td><?php echo $value->sign; ?></td>
                                        <td><?php echo $value->dosage; ?></td>
                                        <td class="text-right">
                                            <a href="<?php echo base_url(); ?>admin/doctor/Setup_controller/edit_medicine/<?php echo $value->medicine_id; ?>"
                                                class="btn btn-xs btn-info">
                                                <i class="fa fa-edit"></i> </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>