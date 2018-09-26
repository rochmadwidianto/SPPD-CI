<section class='content-header'>
    <h1>
        TRANSAKSI
        <small>Edit Transaksi</small>
    </h1>
    <ol class='breadcrumb'>
        <li><a href='#'><i class='fa fa-suitcase'></i>Transaksi</a></li>
        <li class='active'>Edit Transaksi</li>
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
                        <?php
                        echo form_open('transaksi/update_action');
                        ?>
                        <div class='box-body'>
                            <div class='form-group'>No Telp
                                <input type="text" disabled class="form-control" name="no_telp" id="no_telp" placeholder="No Telp" value="<?php echo $no_telp; ?>" />
                            </div>
                            <div class='form-group'>Pelanggan 
                                <select name="id_pelanggan" id="id_pelanggan" class="form-control" >                                 
                                    <?php
                                    if (!empty($pelanggan)) {
                                        foreach ($pelanggan as $row) {
                                            echo "<option value='$row->id_pelanggan'";
                                            echo $id_pelanggan == $row->id_pelanggan ? 'selected' : '';
                                            echo">" . strtoupper($row->nama_pelanggan) . "</option>";
                                        }
                                    }
                                    ?>
                                </select>                                    
                            </div>
                            <div class='form-group'>Nominal
                                <select name="id_nominal" id="id_niminal" class="form-control" >                             
                                    <?php
                                    if (!empty($nominal)) {
                                        foreach ($nominal as $row) {
                                            echo "<option value='$row->id_nominal'";
                                            echo $id_nominal == $row->id_nominal ? 'selected' : '';
                                            echo">$row->nominal</option>";
                                        }
                                    }
                                    ?>
                                </select>                                     
                            </div>
                            <div class='form-group'>Harga 
                                <select name="id_harga" id="id_harga" class="form-control" >                            
                                    <?php
                                    if (!empty($harga)) {
                                        foreach ($harga as $row) {
                                            echo "<option value='$row->id_harga'";
                                            echo $id_harga == $row->id_harga ? 'selected' : '';
                                            echo">" . rupiah($row->harga) . "</option>";
                                        }
                                    }
                                    ?>
                                </select>                                    
                            </div>                                
                            <div class='form-group'>Tgl Bayar <?php echo form_error('tgl_bayar') ?>
                                <input type="datetime" class="form-control datepicker" name="tgl_bayar" data-date-format="yyyy-mm-dd hh:mm" id="datetimepicker" placeholder="yyyy-mm-dd hh:mm" value="<?php echo $tgl_bayar; ?>" />
                            </div>
                            <div class='form-group'>Status 
                                <select name="status" id="status" class="form-control" >
                                    <?php
                                    if ($status == "LUNAS") {
                                        echo' <option value="LUNAS" selected>LUNAS</option>';
                                        echo' <option value="HUTANG">HUTANG</option>';
                                    } else {
                                        echo' <option value="LUNAS">LUNAS</option>';
                                        echo' <option value="HUTANG" selected>HUTANG</option>';
                                    }
                                    ?>                                        
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