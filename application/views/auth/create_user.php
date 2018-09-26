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
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-success">
                <div class="box-header">
                <div class="col-md-5">
                <?php
                    echo form_open('auth/create_user');
                ?> 
                  <div class="text-red"><?php echo $message;?></div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="example">Nama Depan</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" required oninvalid="setCustomValidity('Nama Depan !')"
                                   oninput="setCustomValidity('')" placeholder="Masukan Nama Depan" >
                        </div>                                           
                        <div class="form-group">
                            <label for="">Nama Belakang</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" required oninvalid="setCustomValidity('Nama Belakang !')"
                                   oninput="setCustomValidity('')" placeholder="Masukan Nama Belakang">
                        </div> 
                         <div class="form-group">
                            <label for="">Nama Pengguna</label>
                            <input type="text" class="form-control" name="username" id="username" required oninvalid="setCustomValidity('Nama Pengguna !')"
                                   oninput="setCustomValidity('')" placeholder="Nama Pengguna">
                            <?php echo form_error('username', '<div class="text-red">', '</div>'); ?>
                        </div>  
                        <div class="form-group">
                            <label for="">Alamat Email</label>
                            <input type="email" class="form-control" name="email" id="email" required oninvalid="setCustomValidity('Email Kosong/ Format Tidak Sesuai !')"
                                   oninput="setCustomValidity('')" placeholder="example@example.com">
                        </div>   
                        <div class="form-group">
                            <label for="">Nama Perusahaan</label>
                            <input type="text" class="form-control" name="name_toko" id="name_toko" required oninvalid="setCustomValidity('Email Kosong !')"
                                   oninput="setCustomValidity('')" placeholder="Masukan Alamat email">
                        </div>  
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" id="password" required oninvalid="setCustomValidity('Password Kosong !')"
                                   oninput="setCustomValidity('')" placeholder="Masukan Password (min 8 max 20)">
                        </div>  
                        <div class="form-group">
                            <label for="">Ulangi Password</label>
                            <input type="password" class="form-control" name="password_confirm" id="password_confirm" required oninvalid="setCustomValidity('Ulang Password Kosong !')"
                                   oninput="setCustomValidity('')" placeholder="Ulangi Password">
                        </div>  
                        
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>                        
                        <a href="javascript:history.back()" class="btn btn-warning"><i class="fa fa-reply-all"></i> Kembali</a>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>