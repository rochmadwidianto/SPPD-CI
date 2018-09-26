<section class='content-header'>
    <h1>
        Tahun Anggaran
    </h1>
    <ol class='breadcrumb'>
        <li><a href='dashboard'><i class='fa fa-dashboard'></i>Home</a></li>
        <li><a href='#'><i class='fa fa-navicon'></i>Manajemen Referensi</a></li>
        <li class='active'>Tahun Anggaran</li>
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
                      <label for="thAnggaranNama">Nama</label>
                      <?php echo form_error('thAnggaranNama') ?>
                      <input type="hidden" name="thAnggaranId" value="<?php echo $thAnggaranId; ?>" /> 
                      <input type="text" class="form-control" name="thAnggaranNama" id="thAnggaranNama" placeholder="Nama Tahun Anggaran" value="<?php echo $thAnggaranNama; ?>" />
                    </div>
                    <div class="form-group">
                      <label for="thAnggaranIsAktif">Status Aktif</label>
                      <?php echo form_error('thAnggaranIsAktif') ?>
                      <input type="text" class="form-control" name="thAnggaranIsAktif" id="thAnggaranIsAktif" placeholder="Status Aktif" value="<?php echo $thAnggaranIsAktif; ?>" />
                    </div>
                    <div class="form-group">
                      <label for="thAnggaranIsOpen">Status Open</label>
                      <?php echo form_error('thAnggaranIsOpen') ?>
                      <input type="text" class="form-control" name="thAnggaranIsOpen" id="thAnggaranIsOpen" placeholder="Status Open" value="<?php echo $thAnggaranIsOpen; ?>" />
                    </div>
                    <div class="form-group">
                      <label for="thAnggaranBuka">Tanggal Buka</label>
                      <?php echo form_error('thAnggaranBuka') ?>
                      <input type="text" class="form-control" name="thAnggaranBuka" id="thAnggaranBuka" placeholder="Tanggal Buka" value="<?php echo $thAnggaranBuka; ?>" />
                    </div>
                    <div class="form-group">
                      <label for="thAnggaranTutup">Tanggal tutup</label>
                      <?php echo form_error('thAnggaranTutup') ?>
                      <input type="text" class="form-control" name="thAnggaranTutup" id="thAnggaranTutup" placeholder="Tanggal Tutup" value="<?php echo $thAnggaranTutup; ?>" />
                    </div>
                  </div>
                  <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button> 
                <a href="<?php echo site_url('tahunanggaran') ?>" class="btn btn-warning"><i class="fa fa-reply-all"></i> Batal</a>
              </div>
            </form>
          </div>
          </div><!-- /.row -->
        </section><!-- /.content -->