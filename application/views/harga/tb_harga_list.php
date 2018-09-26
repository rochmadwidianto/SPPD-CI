
<section class='content-header'>
    <h1>
        HARGA
        <small>Daftar harga</small>
    </h1>
    <ol class='breadcrumb'>
        <li><a href='#'><i class='fa fa-suitcase'></i>Seting</a></li>
        <li class='active'>Daftar harga</li>
    </ol>
</section>        
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box box-primary'>  
                <div class='box-header with-border'>
                    <h3 class='box-title'><?php echo anchor('harga/create/', '<i class="glyphicon glyphicon-plus"></i>Tambah Data', array('class' => 'btn btn-primary btn-sm')); ?>
                        <?php echo anchor(site_url('harga/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body table-responsive'>
                    <table class="table table-bordered table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th width="80px">No</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $start = 0;
                            foreach ($harga_data as $harga) {
                                ?>
                                <tr>
                                    <td><?php echo ++$start ?></td>
                                    <td><?php echo rupiah($harga->harga) ?></td>
                                    <td style="text-align:center" width="50px">
                                        <?php
                                        echo anchor(site_url('harga/update/' . $harga->id_harga), '<i class="fa fa-pencil-square-o"></i>', array('data-toggle' => 'tooltip', 'title' => 'edit', 'class' => 'btn btn-info btn-sm'));
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>					
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#mytable").dataTable();
    });
</script>
