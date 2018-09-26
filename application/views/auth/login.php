<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SPPD - ISI Yogyakarta | Login</title>
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
                <a href="#" ><b class="primary-color">SPPD</b><br/>ISI Yogyakarta</a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg text-bold"> Login Dengan Email & Password Anda</p>
                <div id="infoMessage"><?php echo $message;?></div>
                    <?php
                        echo form_open('auth/login');                       
                    ?>                       
                    <div class="form-group has-feedback">
                        <input type="text" name="identity" id="identity" class="form-control" placeholder="Email Address"/>
                        <span class="glyphicon  glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">    
                            <div class="checkbox icheck">
                                <label>
                                    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>  Remember Me
                                </label>
                            </div>                        
                        </div><!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                        </div><!-- /.col -->
                    </div>
                <?php echo form_close();?>                
                <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
                <p><a href="register"><?php echo lang('index_create_user_link');?></a></p>

            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <!-- jQuery 2.1.3 -->
        <script src="<?php echo base_url('assets/js/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script> 
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script> 
        <!-- iCheck -->
        <script src="<?php echo base_url('assets/js/plugins/iCheck/icheck.min.js'); ?>"></script>       
        <script>
            $(function() {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
    </body>
</html>
