<section class='content-header'>
    <h1>
        TRANSAKSI
        <small>Detail transaksi</small>
    </h1>
    <ol class='breadcrumb'>
        <li><a href='#'><i class='fa fa-suitcase'></i>Transaksi</a></li>
        <li class='active'>Detail transaksi</li>
    </ol>
</section>   
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box box-primary'>
                <div class='box-header'>
                    <table class="table table-bordered">
                        <?php
                        if ($status == "LUNAS") {
                            $status_trans = "<span class='label label-success'>" . $status . "</span>";
                        } elseif ($status == "HUTANG") {
                            $status_trans = "<span class='label label-danger'>" . $status . "</span>";
                        }
                        ?>
                        <tr><td>No Transaksi</td><td><?php echo "#".$kode_transaksi; ?></td></tr>
                        <tr><td>No Telp</td><td><?php echo $telp; ?></td></tr>
                        <tr><td>Nama Pelanggan</td><td><?php echo $pelanggan['nama_pelanggan']; ?></td></tr>
                        <tr><td>Nominal</td><td><?php echo $nominal['nominal']; ?></td></tr>
                        <tr><td>Harga</td><td><?php echo rupiah($harga['harga']); ?></td></tr>
                        <tr><td>Status</td><td><?php echo $status_trans; ?></td></tr>
                        <tr><td>Tgl Transaksi</td><td><?php echo tgl_lengkap($tgl_transaksi); ?></td></tr>
                        <tr><td>Tgl Bayar</td><td><?php echo tgl_lengkap($tgl_bayar); ?></td></tr>

                    </table>
                    <div class='box-footer'>
                        <a href="javascript:history.back()" class="btn btn-primary">Back</a>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->