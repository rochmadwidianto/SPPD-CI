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
                  <h3 class="box-title"><i class="<?php echo $icon ?>"></i> <b><?php echo $label_aksi ?></b> <small>Data</small></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="<?php echo $action; ?>" method="post">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="thAnggaranNama" class="col-sm-2 control-label">Nama</label>
                      <div class="col-sm-5">
                        <?php echo form_error('thAnggaranNama') ?>
                        <input type="hidden" name="thAnggaranId" value="<?php echo $thAnggaranId; ?>" /> 
                        <input type="text" class="form-control" name="thAnggaranNama" id="thAnggaranNama" placeholder="Nama Tahun Anggaran" value="<?php echo $thAnggaranNama; ?>" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="thAnggaranIsAktif" class="col-sm-2 control-label">Status</label>
                      <div class="col-sm-10">
                        <?php echo form_error('thAnggaranIsAktif') ?>
                        <label class="radio-inline">
                          <input type="radio" name="thAnggaranIsAktif" id="isAktifYa" value="Ya" <?php echo strtoupper($thAnggaranIsAktif) == 'YA' ? 'checked' : ''; ?>> Aktif
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="thAnggaranIsAktif" id="isAktifTidak" value="Tidak" <?php echo strtoupper($thAnggaranIsAktif) == 'TIDAK' ? 'checked' : ''; ?>> Tidak Aktif
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="thAnggaranIsOpen" class="col-sm-2 control-label">Open</label>
                      <div class="col-sm-10">
                        <?php echo form_error('thAnggaranIsOpen') ?>
                        <label class="radio-inline">
                          <input type="radio" name="thAnggaranIsOpen" id="isOpenYa" value="Ya" <?php echo strtoupper($thAnggaranIsOpen) == 'YA' ? 'checked' : ''; ?>> Ya
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="thAnggaranIsOpen" id="isOpenTidak" value="Tidak" <?php echo strtoupper($thAnggaranIsOpen) == 'TIDAK' ? 'checked' : ''; ?>> Tidak
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="thAnggaranBuka" class="col-sm-2 control-label">Buka</label>
                      <div class="col-sm-3">
                        <div class="input-group date">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <?php echo form_error('thAnggaranBuka') ?>
                          <input type="text" class="form-control datepicker" name="thAnggaranBuka" id="thAnggaranBuka" placeholder="Tanggal Buka" value="<?php echo tgl_indo_long($thAnggaranBuka); ?>" />
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="thAnggaranTutup" class="col-sm-2 control-label">Tutup</label>
                      <div class="col-sm-3">
                        <div class="input-group date">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <?php echo form_error('thAnggaranTutup') ?>
                          <input type="text" class="form-control datepicker" name="thAnggaranTutup" id="thAnggaranTutup" placeholder="Tanggal Tutup" value="<?php echo tgl_indo_long($thAnggaranTutup); ?>" />
                        </div>
                      </div>
                    </div>
                  </div>
              <div class="box-footer">
                <div class="col-sm-10 col-sm-offset-2">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button> 
                  <a href="<?php echo site_url('tahunAnggaran') ?>" class="btn btn-warning"><i class="fa fa-reply-all"></i> Batal</a>
                </div>
              </div>
            </form>
          </div>
          </div><!-- /.row -->
        </section><!-- /.content -->