<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SPPD - ISI Yogyakarta</title>
        <link href='<?php echo base_url("assets/img/favicon.png"); ?>' rel='shortcut icon' type='image/x-icon'/>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.3.2 -->        
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" >
        <!-- font Awesome -->
        <link href="<?php echo base_url('assets/font-awesome-4.4.0/css/font-awesome.min.css'); ?>" rel="stylesheet">
        <!-- Ionicons -->
        <link href="<?php echo base_url('assets/css/ionicons.min.css'); ?>" rel="stylesheet">
        <!-- DATA TABLES -->    
        <link href="<?php echo base_url('assets/js/plugins/datatables/dataTables.bootstrap.css'); ?>" rel="stylesheet">        
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>" rel="stylesheet">
        <!-- AdminLTE Skins. Choose a skin from the css/skins -->
        <link href="<?php echo base_url('assets/css/skins/_all-skins.min.css'); ?>" rel="stylesheet">

        <!-- bootstrap datepicker -->
        <link href="<?php echo base_url('assets/bootstrap/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>" rel="stylesheet" type="text/css">
        <!-- Bootstrap time Picker -->
        <link href="<?php echo base_url('assets/bootstrap/bootstrap-timepicker.min.css'); ?>" rel="stylesheet" type="text/css">
        <!-- Select2 -->
        <link href="<?php echo base_url('assets/bootstrap/select2/dist/css/select2.min.css'); ?>" rel="stylesheet" type="text/css">

        <!--datepicker -->
        <link href="<?php echo base_url('assets/js/plugins/datepicker/bootstrap-datetimepicker.min.css'); ?>" rel="stylesheet" type="text/css">
        <!-- iCheck -->
        <link href="<?php echo base_url('assets/js/plugins/iCheck/flat/blue.css'); ?>" rel="stylesheet" type="text/css">
        <!-- Morris chart -->
        <link href="<?php echo base_url('assets/js/plugins/morris/morris.css'); ?>" rel="stylesheet" type="text/css" >
        <!-- jvectormap -->
        <link href="<?php echo base_url('assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.css'); ?>" rel="stylesheet" type="text/css" >

        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?php echo base_url('assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'); ?>" rel="stylesheet" type="text/css" >

        <link href="<?php echo base_url('assets/css/bootstrap-combobox.css'); ?>" rel="stylesheet" type="text/css" >
        <!-- css untuk export datatable -->
        <link href="<?php echo base_url('assets/css/buttons.dataTables.min.css'); ?>" rel="stylesheet" type="text/css" >
    </head>
    <body class="hold-transition skin-blue sidebar-mini fixed">
        <div class="wrapper">
            <?php echo $_header; ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php echo $_sidebar; ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <?php echo $_content; ?> 
            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.0
                </div>
                <strong>Copyright &copy; <?php echo date('Y')?> <a href="#">  </a> - </strong> All rights reserved
            </footer>

            <div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.3 -->
        <script src="<?php echo base_url('assets/js/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="<?php echo base_url('assets/js/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>

        <script src="<?php echo base_url('assets/js/plugins/datatables/dataTables.bootstrap.js'); ?>"></script>
        <!-- SlimScroll -->
        <script src="<?php echo base_url('assets/js/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
        <!-- InputMask -->
        <script src="<?php echo base_url('assets/js/plugins/input-mask/jquery.inputmask.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/plugins/input-mask/jquery.inputmask.date.extensions.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/plugins/input-mask/jquery.inputmask.extensions.js'); ?>"></script>
        <!-- bootstrap datepicker -->
        <script src="<?php echo base_url('assets/bootstrap/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
        <!-- bootstrap time picker -->
        <script src="<?php echo base_url('assets/bootstrap/bootstrap-timepicker.min.js'); ?>"></script>
        <!-- Select2 -->
        <script src="<?php echo base_url('assets/bootstrap/select2/dist/js/select2.full.min.js'); ?>"></script>
        <!-- Datepicker -->
        <script src="<?php echo base_url('assets/js/plugins/datepicker/bootstrap-datetimepicker.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/plugins/datepicker/locales/bootstrap-datetimepicker.id.js'); ?>"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url('assets/js/plugins/fastclick/fastclick.min.js'); ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url('assets/js/AdminLTE/app.min.js'); ?>"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url('assets/js/AdminLTE/demo.js'); ?>"></script>
        <!-- treeview -->
        <script src="<?php echo base_url('assets/js/plugins/tree-view/jquery.cookie.js'); ?>"></script>  
        <script src="<?php echo base_url('assets/js/plugins/tree-view/jquery.treeview.js'); ?>"></script>  
        <script src="<?php echo base_url('assets/js/plugins/tree-view/demo.js'); ?>" type="text/javascript" ></script>    
        <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-combobox.js'); ?>"></script>

    </body>
</html>
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();

        //Initialize datepicker
        $('.datepicker').datepicker({
            autoclose: true,
            beforeShowDay: $.noop,
            calendarWeeks: false,
            clearBtn: false,
            daysOfWeekDisabled: [],
            endDate: Infinity,
            forceParse: true,
            format: 'd MM yyyy',
            keyboardNavigation: true,
            language: 'id',
            minViewMode: 0,
            multidate: false,
            multidateSeparator: ',',
            orientation: "auto",
            rtl: false,
            startDate: -Infinity,
            startView: 0,
            todayBtn: true,
            todayHighlight: true,
            weekStart: 0
        });
    });

    $(function () {
        $('#datepicker').datepicker();
        $('#datepicker1').datepicker();
    });


    // $(function () {
    //     $('.datepicker').datetimepicker({
    //         language: 'id',
    //         weekStart: 1,
    //         todayBtn: 1,
    //         autoclose: 1,
    //         todayHighlight: 1,
    //         startView: 2,
    //         minView: 2,
    //         forceParse: 0
    //     });
    // });
    // $(function () {
    //     $('#datetimepicker').datetimepicker();
    //     $('#datetimepicker1').datetimepicker();
    // });
</script>


