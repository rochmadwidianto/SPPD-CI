<section class="content-header">
    <h1>
        Dashboard
        <small>Members</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>
                        <?php
                        foreach ($harga as $r) {
                            echo "Rp " . rupiah($r->harga);
                        }
                        ?>
                    </h3>
                    <p>Total Transaksi</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="<?php echo base_url('transaksi'); ?>" class="small-box-footer">More Detail <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>
                        <?php
                        foreach ($lunas as $r) {
                            echo "Rp " . rupiah($r->harga);
                        }
                        ?>
                    </h3>
                    <p>Transaksi Lunas</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="<?php echo base_url('transaksi/lunas'); ?>" class="small-box-footer">More Detail <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>
                        <?php
                        foreach ($hutang as $r) {
                            echo "Rp " . rupiah($r->harga);
                        }
                        ?>
                    </h3>
                    <p>Transaksi Hutang</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="<?php echo base_url('transaksi/hutang'); ?>" class="small-box-footer">More Detail <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>            
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3> 
                        <?php echo $user; ?>
                    </h3> 
                    <p>Total Users </p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="<?php echo base_url('pelanggan'); ?>" class="small-box-footer">More Deatail <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->

    </div><!-- /.row -->
    
    <!-- Left col -->
    <div class="row">
    <div class=" col-md-8">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Transaksi Terakhir</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table class="table no-margin">
                    <thead>
                        <tr>
                            <th>No Transaksi</th>
                            <th>Nama Pelanggan</th>
                            <th>No. Telp</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($transaksi as $transaksi) {
                            if ($transaksi->status == "LUNAS") {
                                $status = "<span class='label label-success'>" . $transaksi->status . "</span>";
                            } elseif ($transaksi->status == "HUTANG") {
                                $status = "<span class='label label-danger'>" . $transaksi->status . "</span>";
                            }
                            ?>
                            <tr>
                                <td><?php echo anchor('transaksi/read/' . $transaksi->id_transaksi, $transaksi->kode_transaksi) ?></td>
                                <td><?php echo $transaksi->nama_pelanggan ?></td>
                                <td><?php echo $transaksi->no_telp ?></td>
                                <td><?php echo $status ?></td>                                    
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
            <a href="<?php echo site_url('transaksi/create'); ?>" class="btn btn-sm btn-info btn-flat pull-left">Tambah Transaksi Baru</a>
            <a href="<?php echo site_url('transaksi'); ?>" class="btn btn-sm btn-default btn-flat pull-right">Lihat Semua Transaksi</a>
        </div>
    </div>
    </div>
    <div class="col-md-4">
                <!-- Info Boxes Style 2 -->
                <div class="info-box bg-yellow">
                    <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Inventory</span>
                        <span class="info-box-number">5,200</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 50%"></div>
                        </div>
                        <span class="progress-description">
                            50% Increase in 30 Days
                        </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Mentions</span>
                        <span class="info-box-number">92,050</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 20%"></div>
                        </div>
                        <span class="progress-description">
                            20% Increase in 30 Days
                        </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
                <div class="info-box bg-red">
                    <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Downloads</span>
                        <span class="info-box-number">114,381</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                        </div>
                        <span class="progress-description">
                            70% Increase in 30 Days
                        </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
                <div class="info-box bg-aqua">
                    <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Direct Messages</span>
                        <span class="info-box-number">163,921</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 40%"></div>
                        </div>
                        <span class="progress-description">
                            40% Increase in 30 Days
                        </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
</div>
    <div style="padding: 10px 0px; text-align: center;">
            <div class="text">Excuse the ads! We need some help to keep our site up.</div>
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- iklan_pulsaqu -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-5746089618495474"
                     data-ad-slot="6145123342"
                     data-ad-format="auto"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
        </div>
</section>