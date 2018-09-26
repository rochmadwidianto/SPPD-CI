<section class='content-header'>
    <h1>
        NOMINAL
        <small>Form nominal</small>
    </h1>
    <ol class='breadcrumb'>
        <li><a href='#'><i class='fa fa-suitcase'></i>Master</a></li>
        <li class='active'>Form nominal</li>
    </ol>
</section>        
<section class='content'>
    <div class='row'>
        <!-- left column -->
        <div class='col-md-12'>
            <!-- general form elements -->
            <div class='box box-primary'>
                <div class='box-header'>
                    <div class='col-md-5'>
                        <form action="<?php echo $action; ?>" method="post">
                            <div class='box-body'>
                                <div class='form-group'>Nominal <?php echo form_error('nominal') ?>
                                    <input type="text" class="form-control" name="nominal" id="nominal" placeholder="exaple: 10 Ribu" value="<?php echo $nominal; ?>" />
                                </div>                                
                            </div>
                            <div class='box-footer'>
                                <input type="hidden" name="id_nominal" value="<?php echo $id_nominal; ?>" /> 
                                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                                <a href="<?php echo site_url('nominal') ?>" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</section><!-- /.content -->