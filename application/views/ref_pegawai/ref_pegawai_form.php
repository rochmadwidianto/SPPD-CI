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
                  <h3 class="box-title"><i class="<?php echo $icon ?>"></i> <b><?php echo $label_aksi ?></b> <small>Data</small></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <form class="form-horizontal" action="<?php echo $action; ?>" method="post">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="pegawaiNip" class="col-sm-2 control-label">NIP</label>
                      <div class="col-sm-5">
                        <?php echo form_error('pegawaiNip') ?>
                        <input type="hidden" name="pegawaiId" value="<?php echo $pegawaiId; ?>" /> 
                        <input type="text" class="form-control" name="pegawaiNip" id="pegawaiNip" placeholder="NIP Pegawai" value="<?php echo $pegawaiNip; ?>" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="pegawaiNama" class="col-sm-2 control-label">Nama</label>
                      <div class="col-sm-5">
                        <?php echo form_error('pegawaiNama') ?>
                        <input type="text" class="form-control" name="pegawaiNama" id="pegawaiNama" placeholder="Nama Pegawai" value="<?php echo $pegawaiNama; ?>" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="pegawaiPangkat" class="col-sm-2 control-label">Pangkat</label>
                      <div class="col-sm-5">
                        <?php echo form_error('pegawaiPangkat') ?>
                        <input type="text" class="form-control" name="pegawaiPangkat" id="pegawaiPangkat" placeholder="Pangkat Pegawai" value="<?php echo $pegawaiPangkat; ?>" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="pegawaiJabatan" class="col-sm-2 control-label">Jabatan</label>
                      <div class="col-sm-5">
                        <?php echo form_error('pegawaiJabatan') ?>
                        <?php echo cmb_dinamis('pegawaiJabatanId', 'ref_jabatan', 'jabatanNama', 'jabatanId', $pegawaiJabatanId) ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="pegawaiGolonganId" class="col-sm-2 control-label">Golongan</label>
                      <div class="col-sm-5">
                        <?php echo form_error('pegawaiGolonganId') ?>
                        <?php echo cmb_dinamis('pegawaiGolonganId', 'ref_golongan', 'golonganNama', 'golonganId', $pegawaiGolonganId) ?>
                      </div>
                    </div>
                  </div>
                  <div class="box-footer">
                    <div class="col-sm-10 col-sm-offset-2">
                      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button> 
                      <a href="<?php echo site_url('pegawai') ?>" class="btn btn-warning"><i class="fa fa-reply-all"></i> Batal</a>
                    </div>
                  </div>
                </form>
          </div>
          </div><!-- /.row -->
        </section><!-- /.content -->