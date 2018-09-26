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
<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class="box box-<?php echo $style_aksi ?>">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo $label_aksi ?> Data</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="<?php echo $action; ?>" method="post">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="golonganKode">Nama</label>
                        <?php echo form_error('name') ?>
                        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                      <input type="text" class="form-control" name="name" id="name" placeholder="nama Group User" value="<?php echo $name; ?>" />
                    </div>
                    <div class="form-group">
                      <label for="golonganNama">Deskripsi</label>
                        <?php echo form_error('description') ?>
                       <input type="text" class="form-control" name="description" id="description" placeholder="Deskripsi Group User" value="<?php echo $description; ?>" />
                    </div>
                  </div>
                  <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button> 
                <a href="<?php echo site_url('groups') ?>" class="btn btn-warning"><i class="fa fa-reply-all"></i> Batal</a>
              </div>
            </form>
          </div>
          </div><!-- /.row -->
        </section><!-- /.content -->