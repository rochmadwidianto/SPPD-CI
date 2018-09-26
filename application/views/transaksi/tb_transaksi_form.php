<section class='content-header'>
    <h1>
        TRANSAKSI
        <small>Tambah Transaksi</small>
    </h1>
    <ol class='breadcrumb'>
        <li><a href='#'><i class='fa fa-suitcase'></i>Transaksi</a></li>
        <li class='active'>Tambah Transaksi</li>
    </ol>
</section>        
<section class='content'>
    <div class='row'>
        <!-- left column -->
        <div class='col-md-12'>
            <!-- general form elements -->
            <div class='box box-primary'>
                <div class='box-header'>
                    <div class='col-md-5'>
                        <form action="<?php echo $action; ?>" method="post">
                            <div class='box-body'>
                                <div class='form-group'>No Telp <?php echo form_error('no_telp') ?>
                                    <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="No Telp" value="" />
                                </div>
                                <div class='form-group'>Pelanggan <?php echo form_error('id_pelanggan') ?>
                                    <select name="id_pelanggan" id="id_pelanggan" class="form-control" > 
                                        <option value="">- Pilih Nama Pelanggan -</option>                               
                                        <?php
                                        if (!empty($pelanggan)) {
                                            foreach ($pelanggan as $row) {
                                                echo "<option value='$row->id_pelanggan'>" . strtoupper($row->nama_pelanggan) . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>                                    
                                </div>
                                <div class='form-group'>Nominal <?php echo form_error('id_nominal') ?>
                                    <select name="id_nominal" id="id_niminal" class="form-control" > 
                                        <option value="">- Pilih Nominal Beli -</option>                               
                                        <?php
                                        if (!empty($nominal)) {
                                            foreach ($nominal as $row) {
                                                echo "<option value='$row->id_nominal'>" . $row->nominal . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>                                     
                                </div>
                                <div class='form-group'>Harga <?php echo form_error('id_harga') ?>
                                    <select name="id_harga" id="id_harga" class="form-control" > 
                                        <option value="">- Pilih Harga -</option>                               
                                        <?php
                                        if (!empty($harga)) {
                                            foreach ($harga as $row) {
                                                echo "<option value='$row->id_harga'>" . rupiah($row->harga) . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>                                    
                                </div>                                
                                <div class='form-group'>Tgl Transaksi <?php echo form_error('tgl_transaksi') ?>
                                    <input type="datetime" class="form-control datepicker" name="tgl_transaksi" data-date-format="yyyy-mm-dd hh:mm" id="datetimepicker" placeholder="yyyy-mm-dd hh:mm" value="<?php echo date('Y-m-d H:i:s') ?>" />
                                </div>
                                <div class='form-group'>Status <?php echo form_error('status') ?>
                                    <select name="status" id="status" class="form-control" >
                                        <option value="LUNAS">LUNAS</option> 
                                        <option value="HUTANG">HUTANG</option>
                                    </select>
                                </div>                               

                            </div>
                            <div class='box-footer'>
                                <input type="hidden" name="id_transaksi" value="<?php echo $id_transaksi; ?>" /> 
                                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                                <a href="<?php echo site_url('transaksi') ?>" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</section><!-- /.content -->