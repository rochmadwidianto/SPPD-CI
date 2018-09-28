<section class='content-header'>
    <h1>
        Standar Biaya SBU
    </h1>
    <ol class='breadcrumb'>
        <li><a href='dashboard'><i class='fa fa-dashboard'></i>Home</a></li>
        <li><a href='#'><i class='fa fa-navicon'></i>Manajemen Referensi</a></li>
        <li class='active'>Biaya SBU</li>
    </ol>
</section> 
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header with-border'>
                    <h3 class='box-title'>
                		<?php echo anchor(site_url('biayasbu/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?>  
                        <?php echo anchor(site_url('biayasbu/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>  
                        <?php echo anchor('biayasbu/create/',' <i class="fa fa-plus"></i> Tambah',array('class'=>'btn btn-success btn-sm'));?>
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
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>MAK</th>
                            <th>Sumber Dana</th>
                            <th width="100px">Aksi</th>
                        </tr>
                    </thead>
            	    <tbody>
                        <?php
                        $start = 0;
                        foreach ($biayaSbu_data as $biayasbu)
                        {
                            ?>
                            <tr>
            		    <td align="center"><?php echo ++$start ?></td>
            		    <td><?php echo $biayasbu->biayaSbuKode ?></td>
            		    <td><?php echo $biayasbu->biayaSbuNama ?></td>
                        <td><?php echo '<b>['.$biayasbu->makKode.']</b>  '.$biayasbu->makNama ?></td>
                        <td><?php echo '<b>[ '.$biayasbu->sumberdanaKode.' ]</b>  '.$biayasbu->sumberdanaNama ?></td>
            		    <td align="center" nowrap>
            			<?php 
            			echo anchor(site_url('biayasbu/read/'.$biayasbu->biayaSbuId),'<i class="fa fa-eye"></i>',array('data-toggle' => 'tooltip', 'title'=>'Detail','class'=>'btn btn-info btn-xs')); 
            			echo '  '; 
            			echo anchor(site_url('biayasbu/update/'.$biayasbu->biayaSbuId),'<i class="fa fa-pencil-square-o"></i>',array('data-toggle' => 'tooltip', 'title'=>'Ubah','class'=>'btn btn-warning btn-xs')); 
            			echo '  '; 
            			echo anchor(site_url('biayasbu/delete/'.$biayasbu->biayaSbuId),'<i class="fa fa-trash-o"></i>','data-toggle="tooltip" title="Hapus" class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Apakah anda yakin ?\')"'); 
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