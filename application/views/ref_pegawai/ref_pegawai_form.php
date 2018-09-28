<section class='content-header'>
    <h1>
        Pegawai
    </h1>
    <ol class='breadcrumb'>
        <li><a href='dashboard'><i class='fa fa-dashboard'></i>Home</a></li>
        <li><a href='#'><i class='fa fa-navicon'></i>Manajemen Referensi</a></li>
        <li class='active'>Pegawai</li>
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
                      <label for="pegawaiNip">NIP</label>
                      <?php echo form_error('pegawaiNip') ?>
                      <input type="hidden" name="pegawaiId" value="<?php echo $pegawaiId; ?>" /> 
                      <input type="text" class="form-control" name="pegawaiNip" id="pegawaiNip" placeholder="NIP Pegawai" value="<?php echo $pegawaiNip; ?>" />
                    </div>
                    <div class="form-group">
                      <label for="pegawaiNama">Nama</label>
                      <?php echo form_error('pegawaiNama') ?>
                      <input type="text" class="form-control" name="pegawaiNama" id="pegawaiNama" placeholder="Nama Pegawai" value="<?php echo $pegawaiNama; ?>" />
                    </div>
                    <div class="form-group">
                      <label for="pegawaiPangkat">Pangkat</label>
                      <?php echo form_error('pegawaiPangkat') ?>
                      <input type="text" class="form-control" name="pegawaiPangkat" id="pegawaiPangkat" placeholder="Pangkat Pegawai" value="<?php echo $pegawaiPangkat; ?>" />
                    </div>
                    <div class="form-group">
                      <label for="pegawaiJabatan">Jabatan</label>
                      <?php echo form_error('pegawaiJabatan') ?>
                      <?php echo cmb_dinamis('pegawaiJabatanId', 'ref_jabatan', 'jabatanNama', 'jabatanId', $pegawaiJabatanId) ?>
                    </div>
                    <div class="form-group">
                      <label for="pegawaiGolonganId">Golongan</label>
                      <?php echo form_error('pegawaiGolonganId') ?>
                      <?php echo cmb_dinamis('pegawaiGolonganId', 'ref_golongan', 'golonganNama', 'golonganId', $pegawaiGolonganId) ?>
                    </div>
                  </div>
                  <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button> 
                <a href="<?php echo site_url('pegawai') ?>" class="btn btn-warning"><i class="fa fa-reply-all"></i> Batal</a>
              </div>
            </form>
          </div>
          </div><!-- /.row -->
        </section><!-- /.content -->