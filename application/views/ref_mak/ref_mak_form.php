<section class='content-header'>
    <h1>
        Mata Anggaran Kegiatan
    </h1>
    <ol class='breadcrumb'>
        <li><a href='dashboard'><i class='fa fa-dashboard'></i>Home</a></li>
        <li><a href='#'><i class='fa fa-navicon'></i>Manajemen Referensi</a></li>
        <li class='active'>Mata Anggaran Kegiatan</li>
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
                      <label for="makKode">Kode</label>
                      <?php echo form_error('makKode') ?>
                      <input type="hidden" name="makId" value="<?php echo $makId; ?>" /> 
                      <input type="text" class="form-control" name="makKode" id="makKode" placeholder="Kode MAK" value="<?php echo $makKode; ?>" />
                    </div>
                    <div class="form-group">
                      <label for="makNama">Nama</label>
                      <?php echo form_error('makNama') ?>
                      <input type="text" class="form-control" name="makNama" id="makNama" placeholder="Nama MAK" value="<?php echo $makNama; ?>" />
                    </div>
                    <div class="form-group">
                      <label for="makBiayaSbuId">Biaya SBU</label>
                      <?php echo form_error('makBiayaSbuId') ?>
                      <?php echo cmb_dinamis('makBiayaSbuId', 'ref_biaya_sbu', 'biayaSbuNama', 'biayaSbuId', $makBiayaSbuId) ?>
                    </div>
                  </div>
                  <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button> 
                <a href="<?php echo site_url('mak') ?>" class="btn btn-warning"><i class="fa fa-reply-all"></i> Batal</a>
              </div>
            </form>
          </div>
          </div><!-- /.row -->
        </section><!-- /.content -->