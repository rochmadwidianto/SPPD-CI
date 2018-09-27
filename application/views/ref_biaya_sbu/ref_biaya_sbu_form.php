<section class='content-header'>
    <h1>
        Standar Biaya SBU
    </h1>
    <ol class='breadcrumb'>
        <li><a href='dashboard'><i class='fa fa-dashboard'></i>Home</a></li>
        <li><a href='#'><i class='fa fa-navicon'></i>Manajemen Referensi</a></li>
        <li class='active'>Standar Biaya SBU</li>
    </ol>
</section> 
<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class="box box-<?php echo $style_aksi ?>">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo $label_aksi ?> Data</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="<?php echo $action; ?>" method="post">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="biayaSbuKode">Kode</label>
                      <input type="hidden" name="biayaSbuId" value="<?php echo $biayaSbuId; ?>" /> 
                      <input type="text" class="form-control" name="biayaSbuKode" id="biayaSbuKode" placeholder="Kode Biaya SBU" value="<?php echo $biayaSbuKode; ?>" />
                    </div>
                    <div class="form-group">
                      <label for="biayaSbuNama">Nama</label>
                      <input type="text" class="form-control" name="biayaSbuNama" id="biayaSbuNama" placeholder="Nama Biaya SBU" value="<?php echo $biayaSbuNama; ?>" />
                    </div>
                  </div>
                  <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button> 
                <a href="<?php echo site_url('biayasbu') ?>" class="btn btn-warning"><i class="fa fa-reply-all"></i> Batal</a>
              </div>
            </form>
          </div>
          </div><!-- /.row -->
        </section><!-- /.content -->