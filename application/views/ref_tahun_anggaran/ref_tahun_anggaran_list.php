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
              <div class='box'>
                <div class='box-header with-border'>
                    <h3 class='box-title'>
                		<?php echo anchor(site_url('tahunanggaran/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?>
                        <?php echo anchor(site_url('tahunanggaran/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
                        <?php echo anchor('tahunanggaran/create/',' <i class="fa fa-plus"></i> Tambah',array('class'=>'btn btn-success btn-sm'));?>
                    </h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                            <i class="fa fa-minus">
                        </i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class='box-body'>
                <table class="table table-bordered table-striped table-hover" id="mytable">
                    <thead>
                        <tr>
                            <th width="40px">No</th>
                		    <th>Nama</th>
                		    <th>Status Aktif</th>
                		    <th>Status Open</th>
                		    <th>Tanggal Buka</th>
                		    <th>Tanggal Tutup</th>
                		    <th width="100px">Aksi</th>
                        </tr>
                    </thead>
            	    <tbody>
                        <?php
                        $start = 0;
                        foreach ($tahunanggaran_data as $tahunanggaran)
                        {
                            ?>
                            <tr>
            		    <td align="center"><?php echo ++$start ?></td>
            		    <td><?php echo $tahunanggaran->thAnggaranNama ?></td>
            		    <td align="center"><?php echo $tahunanggaran->thAnggaranIsAktif ?></td>
            		    <td align="center"><?php echo $tahunanggaran->thAnggaranIsOpen ?></td>
            		    <td><?php echo $tahunanggaran->thAnggaranBuka ?></td>
            		    <td><?php echo $tahunanggaran->thAnggaranTutup ?></td>
            		    <td align="center" nowrap>
            			<?php 
            			echo anchor(site_url('tahunanggaran/read/'.$tahunanggaran->thAnggaranId),'<i class="fa fa-eye"></i>',array('data-toggle'=>'tooltip', 'title'=>'Detail','class'=>'btn btn-info btn-xs')); 
            			echo '  '; 
            			echo anchor(site_url('tahunanggaran/update/'.$tahunanggaran->thAnggaranId),'<i class="fa fa-pencil-square-o"></i>',array('data-toggle'=>'tooltip', 'title'=>'Ubah','class'=>'btn btn-warning btn-xs')); 
            			echo '  '; 
            			echo anchor(site_url('tahunanggaran/delete/'.$tahunanggaran->thAnggaranId),'<i class="fa fa-trash-o"></i>','data-toggle="tooltip" title="Hapus" class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Apakah anda yakin ?\')"'); 
            			?>
            		    </td>
            	        </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
                <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
                <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $("#mytable").dataTable();
                    });
                </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->