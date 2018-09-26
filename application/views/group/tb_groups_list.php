<section class='content-header'>
	<h1>
		Group User
	</h1>
	<ol class='breadcrumb'>
        <li><a href='dashboard'><i class='fa fa-dashboard'></i>Home</a></li>
		<li><a href='#'><i class='fa fa-suitcase'></i>Setting</a></li>
		<li class='active'>Group User</li>
	</ol>
</section>        
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box box-primary'>  
                <div class='box-header with-border'>
                  <h3 class='box-title'><?php echo anchor('groups/create/','<i class="fa fa-plus"></i> Tambah',array('class'=>'btn btn-success btn-sm'));?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
					<table class="table table-bordered table-striped table-hover" id="mytable">
						<thead>
							<tr>
								<th width="40px">No</th>
							    <th>Nama</th>
							    <th>Deskripsi</th>
							    <th width="100px">Aksi</th>
							</tr>
						</thead>
	   					 <tbody>
							<?php
								$start = 0;
								foreach ($groups_data as $groups)
							{
							?>
							<tr>
							    <td><?php echo ++$start ?></td>
							    <td><?php echo $groups->name ?></td>
							    <td><?php echo $groups->description ?></td>
							    <td align="center" nowrap>
								<?php 
									echo anchor(site_url('groups/read/'.$groups->id),'<i class="fa fa-eye"></i>',array('data-toggle'=>'tooltip','title'=>'Detail','class'=>'btn btn-info btn-xs')); 
									echo '  '; 
									echo anchor(site_url('groups/update/'.$groups->id),'<i class="fa fa-pencil-square-o"></i>',array('data-toggle'=>'tooltip','title'=>'Ubah','class'=>'btn btn-warning btn-xs')); 
									echo '  '; 
									echo anchor(site_url('groups/delete/'.$groups->id),'<i class="fa fa-trash-o"></i>','data-toggle="tooltip" title="Hapus" class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Apakah anda yakin ?\')"'); 
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
