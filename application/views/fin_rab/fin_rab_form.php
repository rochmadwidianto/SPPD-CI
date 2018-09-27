<section class='content-header'>
    <h1>
        Rencana Anggaran Belanja (RAB)
    </h1>
    <ol class='breadcrumb'>
        <li><a href='dashboard'><i class='fa fa-dashboard'></i>Home</a></li>
        <li><a href='#'><i class='fa fa-navicon'></i>Manajemen Referensi</a></li>
        <li class='active'>Rencana Anggaran Belanja (RAB)</li>
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
                      <label for="rabThnAnggId">Tahun Anggaran</label>
                      <?php echo form_error('rabThnAnggId') ?>
                      <?php echo cmb_dinamis('rabThnAnggId', 'ref_tahun_anggaran', 'thAnggaranNama', 'thAnggaranId', $rabThnAnggId) ?>
                    </div>
                    <div class="form-group">
                      <label for="rabKode">Kode</label>
                      <?php echo form_error('rabKode') ?>
                      <input type="hidden" name="rabId" value="<?php echo $rabId; ?>" /> 
                      <input type="text" class="form-control" name="rabKode" id="rabKode" placeholder="Kode RAB" value="<?php echo $rabKode; ?>" />
                    </div>
                    <div class="form-group">
                      <label for="rabNama">Nama</label>
                      <?php echo form_error('rabNama') ?>
                      <input type="text" class="form-control" name="rabNama" id="rabNama" placeholder="Nama RAB" value="<?php echo $rabNama; ?>" />
                    </div>
                    <div class="form-group">
                      <label for="rabKeterangan">Keterangan</label>
                      <textarea rows="2" name="rabKeterangan" class="form-control" placeholder="Keterangan"><?php echo $rabKeterangan; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="rabNominalTotal">Nominal</label>
                      <?php echo form_error('rabNominalTotal') ?>
                      <input type="text" class="form-control" name="rabNominalTotal" id="rabNominalTotal" placeholder="Nominal RAB" value="<?php echo $rabNominalTotal; ?>" />
                    </div>
                  </div>
                  <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button> 
                <a href="<?php echo site_url('rab') ?>" class="btn btn-warning"><i class="fa fa-reply-all"></i> Batal</a>
              </div>
            </form>
          </div>
          </div><!-- /.row -->
        </section><!-- /.content -->