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
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Detail Data</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                  <div class="box-body">
                    <dl class="dl-horizontal">
                      <dt>Nama</dt>
                      <dd><?php echo $thAnggaranNama; ?></dd>
                    </dl>
                    <dl class="dl-horizontal">
                      <dt>Status Aktif</dt>
                      <dd><?php echo $thAnggaranIsAktif; ?></dd>
                    </dl>
                    <dl class="dl-horizontal">
                      <dt>Status Open</dt>
                      <dd><?php echo $thAnggaranIsOpen; ?></dd>
                    </dl>
                    <dl class="dl-horizontal">
                      <dt>Tanggal Buka</dt>
                      <dd><?php echo $thAnggaranBuka; ?></dd>
                    </dl>
                    <dl class="dl-horizontal">
                      <dt>Tanggal Tutup</dt>
                      <dd><?php echo $thAnggaranTutup; ?></dd>
                    </dl>
                  </div>
                  <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo site_url('tahunanggaran') ?>" class="btn btn-warning"><i class="fa fa-reply-all"></i> Kembali</a>
              </div>
          </div>
          </div><!-- /.row -->
        </section><!-- /.content -->