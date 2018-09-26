<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SPPD - ISI Yogyakarta | Register</title>
        <link href='<?php echo base_url("assets/img/favicon.ico"); ?>' rel='shortcut icon' type='image/x-icon'/>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" >
        <!-- Font Awesome Icons -->
        <link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet">  
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>" rel="stylesheet">        
        <!-- iCheck -->
        <link href="<?php echo base_url('assets/js/plugins/iCheck/square/blue.css'); ?>" rel="stylesheet"> 
        <link href="<?php echo base_url('assets/css/main_style.css'); ?>" rel="stylesheet" >

    </head>
    <body class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#" ><b class="primary-color">PULSA</b>Qu</a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg text-bold"> Registrasi User Baru</p>  
                <?php echo $message;?>
                <?php
                echo form_open('auth/register');
                ?> 
                <div class="row form-group">
                    <div class="col-lg-6">
                        <?php echo form_error('first_name') ?>
                        <div class="input-group">
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Nama Depan">
                            <span class="glyphicon  glyphicon-user form-control-feedback"></span>
                        </div>                        
                    </div>
                    <div class="col-lg-6">
                        <?php echo form_error('last_name') ?>
                        <div class="input-group">                            
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Nama Belakang">
                            <span class="glyphicon  glyphicon-user form-control-feedback"></span>
                        </div>                        
                    </div>
                </div>
                <?php echo form_error('username') ?>
                <div class="form-group has-feedback">
                    <input type="text" name="username" id="username" class="form-control" placeholder="Nama Pengguna"/>
                    <span class="glyphicon  glyphicon-user form-control-feedback"></span>
                </div>
                <?php echo form_error('company') ?>
                <div class="form-group has-feedback">
                    <input type="text" name="company" id="company" class="form-control" placeholder="Nama Toko"/>
                    <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                </div> 
                <?php echo form_error('email') ?>
                <div class="form-group has-feedback">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email Address"/>
                    <span class="glyphicon  glyphicon-envelope form-control-feedback"></span>
                </div>
                <?php echo form_error('password') ?>
                <div class="form-group has-feedback">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <?php echo form_error('password_confirm') ?>
                <div class="form-group has-feedback">
                    <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Ulangi Password"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>                
                <div class="col-xs-8">    

                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
                </div>
                <?php echo form_close(); ?>  
                <div class="row">
                    <div class="col-xs-8">
                        <a href="login"><< Back To Login</a>
                    </div>
                </div>                 
            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <!-- jQuery 2.1.3 -->
        <script src="<?php echo base_url('assets/js/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script> 
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script> 
        <!-- iCheck -->
        <script src="<?php echo base_url('assets/js/plugins/iCheck/icheck.min.js'); ?>"></script>       
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
    </body>
</html>
