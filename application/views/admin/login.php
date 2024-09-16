<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Doki Jong's Kiddie Clinic Portal V1.0: Your Child's Health, Simplified</title>

        <?php 
            // Query for logo 
            $result = $this->db->select('*')->from('web_pages_tbl')->where('name', 'fabicon')->where('status', 1)->get()->row();
        ?>
        <!-- favicon -->
        <link rel="icon" href="<?php echo (!empty($result->picture) ? $result->picture : null); ?>" sizes="16x16"> 
        <!-- Bootstrap -->
        <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!-- Pe-icon-7-stroke -->
        <link href="<?php echo base_url();?>assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
        <!-- Custom style -->
        <link href="<?php echo base_url();?>assets/dist/css/custom-style.css" rel="stylesheet" type="text/css"/>
        
        <!-- jQuery -->
        <script src="<?php echo base_url();?>assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>

        <style>
            body {
                background: url('https://img.freepik.com/free-photo/3d-cartoon-background-children_23-2150150798.jpg?t=st=1720002350~exp=1720005950~hmac=9f4663f47e8dd47bbd336987f0e57f551a830dcd575b5a08b28afd609bd55fe2&w=826') no-repeat center center fixed;
                background-size: cover;
                font-family: 'Comic Sans MS', cursive, sans-serif;
            }
            .login-wrapper {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                padding: 20px;
            }
            .panel {
                background-color: rgba(255, 255, 255, 0.9);
                border-radius: 15px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
            .panel-heading {
                text-align: center;
                background-color: #f8c291;
                border-top-left-radius: 15px;
                border-top-right-radius: 15px;
                padding: 20px;
            }
            .header-icon {
                font-size: 50px;
                color: #e67e22;
            }
            .header-title h3 {
                font-size: 24px;
                color: #e67e22;
            }
            .header-title small {
                font-size: 16px;
                color: #6c757d;
                display: block;
                margin-top: 10px;
            }
            .form-control {
                border-radius: 10px;
            }
            .btn-success {
                background-color: #e67e22;
                border: none;
                border-radius: 10px;
                font-size: 18px;
                padding: 10px;
                transition: background-color 0.3s;
            }
            .btn-success:hover {
                background-color: #d35400;
            }
            .panel-body {
                padding: 30px;
            }
        </style>
    </head>

    <body>
        <!-- Content Wrapper -->
        <div class="login-wrapper">
            <div class="container-center">
                <div class="panel panel-bd">
                    <?php 
                        $exception = $this->session->flashdata('exception');
                        if (!empty($exception)) {
                            echo '<div class="alert alert-danger">
                                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Oops!</strong> '.$exception.'
                              </div>';
                        }
                    ?>

                    <div class="panel-heading">
                        <div class="view-header">
                            <div class="header-icon">
                                <i class="pe-7s-unlock"></i>
                            </div>
                            <div class="header-title">
                                <h3>Doki Jong's Kiddie Clinic Portal</h3>
                                <small>Your Child's Health, Simplified</small>
                                <small><strong><?php echo display('login_title');?></strong></small>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        <?php
                            $attributes = array('method' => 'post', 'role' => 'form');
                            echo form_open_multipart('authentication', $attributes); 
                        ?>
                            <div class="form-group">
                                <input class="form-control" id="eml" placeholder="<?php echo display('email');?>" name="email" type="email" autofocus required />
                                <span><?php echo form_error('email');?></span>
                            </div>

                            <div class="form-group">
                                <input class="form-control" id="pass" placeholder="<?php echo display('password');?>" name="password" type="password" required />
                                <span><?php echo form_error('password');?></span>
                            </div>

                            <div class="form-group">
                                <select class="form-control" name="type" required>
                                    <option value="">Select One</option>
                                    <option value="1">Secretary</option>
                                    <option value="2"><?php echo display('Doctor');?></option>
                                    <option value="3">User</option>
                                </select>
                                <span><?php echo form_error('type');?></span>
                            </div>

                            <div class="form-group">
                                <input name="remember" type="checkbox"> <?php echo display('remember_me')?>
                            </div>

                            <button type="submit" class="btn btn-lg btn-success btn-block"><?php echo display('login');?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->
       
        <!-- bootstrap js -->
        <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>
