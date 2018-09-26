<section class='content-header'>
    <h1>
        PELANGGAN
        <small>Form pelanggan</small>
    </h1>
    <ol class='breadcrumb'>
        <li><a href='#'><i class='fa fa-suitcase'></i>Master</a></li>
        <li class='active'>Form pelanggan</li>
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
                                <div class='form-group'>Nama Pelanggan <?php echo form_error('nama_pelanggan') ?>
                                    <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan" placeholder="Nama Pelanggan" value="<?php echo $nama_pelanggan; ?>" />
                                </div>
                                <div class='form-group'>Alamat <?php echo form_error('alamat') ?>
                                    <textarea type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" ><?php echo $alamat; ?></textarea>
                                </div>
                                <div class='form-group'>No Telp <?php echo form_error('no_telpn') ?>
                                    <input type="number" class="form-control" name="no_telpn" id="no_telpn" placeholder="No Telp" value="<?php echo $no_telpn; ?>" />
                                </div>                                
                            </div>
                            <div class='box-footer'>
                                <input type="hidden" name="id_pelanggan" value="<?php echo $id_pelanggan; ?>" /> 
                                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                                <a href="<?php echo site_url('pelanggan') ?>" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</section><!-- /.content -->