<section class='content-header'>
  <h1>
    User
  </h1>
  <ol class='breadcrumb'>
        <li><a href='dashboard'><i class='fa fa-dashboard'></i>Home</a></li>
    <li><a href='#'><i class='fa fa-suitcase'></i>Setting</a></li>
    <li class='active'>User</li>
  </ol>
</section>       
<section class="content">   

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class='box-header with-border'>
                    <h3 class='box-title'><a href="<?php echo base_url('auth/create_user'); ?>" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i> Tambah</a></h3>
                            <label calss='control-label' ></label>
                </div>
                <div class="box-body">
                    <table id="mytable" class="table table-bordered table-striped table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="40px">No</th>
                                <th>Nama User</th>
                                <th>Nama Lengkap</th>
                                <th>Alamat Email</th>
                                <th>Nama Perusahaan</th> 
                                <th>Telpn</th>   
                                <th>Status</th>                                                           
                                <th>Ubah</th>  
                                <th>Hapus</th>                                
                            </tr>
                        </thead>
                       <?php
                       $no=1;                  
                       foreach ($tb_users as $user){ 
                           echo"
                               <tr>
                               <td align='center'>$no</td>
                               <td>".$user->username."</td>
                               <td>".strtoupper($user->first_name),' ',strtoupper($user->last_name)."</td>
                               <td>".$user->email."</td>
                               <td>".strtoupper($user->company)."</td> 
                               <td>".$user->phone."</td>
                               ";?>                             
                               <td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
                               <?php echo"
                               <td align='center'>" . anchor('auth/edit_user/'.$user->id, '<i class="btn btn-warning btn-xs fa fa-pencil" data-toggle="tooltip" title="Ubah"></i>') . "</td>
                               <td align='center'>" . anchor('auth/delete/' . $user->id, '<i class="btn btn-xs btn-danger fa fa-trash" data-toggle="tooltip" title="Hapus"></i>', array('onclick' => "return confirm('Apakah anda yakin ?')")) . "</td>

                               </tr>";
                           $no++;
                       }
                       ?>
                    </Table> 
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->
<script src="<?php echo base_url('assets/js/jquery-1.12.0.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#mytable").dataTable();
    });
</script>