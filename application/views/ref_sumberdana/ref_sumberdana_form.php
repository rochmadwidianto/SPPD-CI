<section class='content-header'>
    <h1>
        Sumber Dana
    </h1>
    <ol class='breadcrumb'>
        <li><a href='dashboard'><i class='fa fa-dashboard'></i>Home</a></li>
        <li><a href='#'><i class='fa fa-navicon'></i>Manajemen Referensi</a></li>
        <li class='active'>Sumber Dana</li>
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
                      <label for="sumberdanaKode">Kode</label>
                      <input type="hidden" name="sumberdanaId" value="<?php echo $sumberdanaId; ?>" /> 
                      <input type="text" class="form-control" name="sumberdanaKode" id="sumberdanaKode" placeholder="Kode Sumber Dana" value="<?php echo $sumberdanaKode; ?>" />
                    </div>
                    <div class="form-group">
                      <label for="sumberdanaNama">Nama</label>
                      <input type="text" class="form-control" name="sumberdanaNama" id="sumberdanaNama" placeholder="Nama Sumber Dana" value="<?php echo $sumberdanaNama; ?>" />
                    </div>
                  </div>
                  <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button> 
                <a href="<?php echo site_url('sumberdana') ?>" class="btn btn-warning"><i class="fa fa-reply-all"></i> Batal</a>
              </div>
            </form>
          </div>
          </div><!-- /.row -->
        </section><!-- /.content -->