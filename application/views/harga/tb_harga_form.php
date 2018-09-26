
<section class='content-header'>
    <h1>
        HARGA
        <small>Edit harga</small>
    </h1>
    <ol class='breadcrumb'>
        <li><a href='#'><i class='fa fa-suitcase'></i>Master</a></li>
        <li class='active'>Edit harga</li>
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
                                <div class='form-group'>Harga <?php echo form_error('harga') ?>
                                    <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" />
                                </div>                                
                            </div>
                            <div class='box-footer'>
                                <input type="hidden" name="id_harga" value="<?php echo $id_harga; ?>" /> 
                                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                                <a href="<?php echo site_url('harga') ?>" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</section><!-- /.content -->