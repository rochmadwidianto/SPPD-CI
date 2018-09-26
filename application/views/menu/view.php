<section class='content-header'>
  <h1>
    Menu
  </h1>
  <ol class='breadcrumb'>
        <li><a href='dashboard'><i class='fa fa-dashboard'></i>Home</a></li>
    <li><a href='#'><i class='fa fa-suitcase'></i>Setting</a></li>
    <li class='active'>Menu</li>
  </ol>
</section>       
<section class="content">   

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class='box-header with-border'>
                    <h3 class='box-title'><a href="<?php echo base_url('menu/add'); ?>" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i> Tambah</a></h3>
                            <label calss='control-label' ></label>
                </div>
                <div class="box-body">
                    <table id="mytable" class="table table-bordered table-striped table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="40px">No</th>
                                <th>Nama Menu</th>
                                <th>Icon</th>
                                <th>Link</th>
                                <th>Kat. Menu</th>                                                              
                                <th>Ubah</th>   
                                <th>Hapus</th>                                 
                            </tr>
                        </thead>
                       <?php
                       $no=1;
                       function chek($id) {
                            $CI = get_instance();
                            $result = $CI->db->get_where('tb_menu', array('id_menu' => $id))->row_array();
                            return $result['nama_menu'];
                        }
                       foreach ($record as $r){    
                        $katmenu = $r->parent == 0 ? 'Menu Utama' : chek($r->parent);
                           echo"
                               <tr>
                               <td>$no</td>
                               <td>".$r->nama_menu."</td>
                               <td>".$r->icon."</td>
                               <td>".$r->link."</td>
                               <td>".$katmenu."</td>                                                       
                               <td>" . anchor('menu/edit/' . $r->id_menu, '<i class="btn btn-warning btn-xs fa fa-pencil" data-toggle="tooltip" title="Ubah"></i>') . "</td>
                               <td>" . anchor('menu/delete/' . $r->id_menu, '<i class="btn btn-danger btn-xs fa fa-trash-o" data-toggle="tooltip" title="Hapus"></i>', array('onclick' => "return confirm('Data Akan di Hapus?')")) . "</td>
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