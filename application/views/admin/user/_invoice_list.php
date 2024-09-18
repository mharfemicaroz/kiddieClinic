<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-world"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('invoice_list'); ?></h1>
            <small><?php echo display('invoice_list'); ?></small>

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

        <div class="row">

            <div class="col-sm-12">
                <div class="panel panel-bd thumbnail">

                    <div class="panel-heading no-print">
                        <div class="btn-group">
                            <a class="btn btn-success" href="<?php echo base_url(); ?>admin/user/Invoice"> <i
                                    class="fa fa-plus"></i> Add Invoice </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="prescription">
                            <thead>
                                <tr role="row">
                                    <th><?php echo display('sl_no') ?></th>
                                    <th><?php echo display('invoice_id') ?></th>
                                    <th><?php echo display('patient_name') ?></th>
                                    <th><?php echo display('grand_total') ?></th>
                                    <th><?php echo display('paid') ?></th>
                                    <th><?php echo display('due') ?></th>
                                    <th><?php echo display('date') ?> </th>
                                    <th><?php echo display('action') ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1;
                                foreach ($invo as $value) { ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $value->invoice_id; ?></td>
                                        <td><?php echo $value->family_name . ' ' . $value->given_name; ?></td>
                                        <td><?php echo $value->grand_total; ?></td>
                                        <td><?php echo $value->paid; ?></td>
                                        <td><?php echo $value->due; ?></td>
                                        <td><?php echo $value->date_time; ?></td>
                                        <td class="center">
                                            <a href="<?php echo base_url(); ?>admin/user/Invoice/invoice_view/<?php echo $value->invoice_id; ?>"
                                                class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
                                            <a href="<?php echo base_url(); ?>admin/user/Invoice/edit_invoice/<?php echo $value->invoice_id; ?>"
                                                class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="<?php echo base_url(); ?>admin/user/Invoice/delete/<?php echo $value->invoice_id; ?>"
                                                onclick="return confirm('Are You Sure ? ')" class="btn btn-xs btn-danger"><i
                                                    class="fa fa-trash"></i></a>
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