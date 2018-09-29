<section class='content-header'>
    <h1>
        Jabatan
    </h1>
    <ol class='breadcrumb'>
        <li><a href='dashboard'><i class='fa fa-dashboard'></i>Home</a></li>
        <li><a href='#'><i class='fa fa-navicon'></i>Manajemen Referensi</a></li>
        <li class='active'>Jabatan</li>
    </ol>
</section> 
<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class="box box-<?php echo $style_aksi ?>">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="<?php echo $icon ?>"></i> <b><?php echo $label_aksi ?></b> <small>Data</small></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="<?php echo $action; ?>" method="post">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="jabatanKode" class="col-sm-2 control-label">Kode</label>
                      <div class="col-sm-5">
                        <?php echo form_error('jabatanKode') ?>
                        <input type="hidden" name="jabatanId" value="<?php echo $jabatanId; ?>" /> 
                        <input type="text" class="form-control" name="jabatanKode" id="jabatanKode" placeholder="Kode Jabatan" value="<?php echo $jabatanKode; ?>" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="jabatanNama" class="col-sm-2 control-label">Nama</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" name="jabatanNama" id="jabatanNama" placeholder="Nama Jabatan" value="<?php echo $jabatanNama; ?>" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="jabatanKeterangan" class="col-sm-2 control-label">Keterangan</label>
                      <div class="col-sm-5">
                        <textarea class="form-control" name="jabatanKeterangan" id="jabatanKeterangan" placeholder="Keterangan" rows="2" cols="50"><?php echo $jabatanKeterangan;?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="box-footer">
                    <div class="col-sm-10 col-sm-offset-2">
                      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button> 
                      <a href="<?php echo site_url('jabatan') ?>" class="btn btn-warning"><i class="fa fa-reply-all"></i> Batal</a>
                    </div>
                  </div>
                </form>
          </div>
          </div><!-- /.row -->
        </section><!-- /.content -->