<section class="content">

    <div class="row">
        <div class="col-md-4">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/img/avatar5.png'); ?>" alt="User profile picture">
                    <h3 class="profile-username text-center"><?php echo $first_name,' ',$last_name ;?></h3>
                    
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Nama Pengguna</b> <a class="pull-right"><?php echo $username ;?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Nama Toko </b> <a class="pull-right"><?php echo strtoupper($company) ;?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Alamat Email </b> <a class="pull-right"><?php echo $email ;?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Telpn</b> <a class="pull-right"><?php echo $phone ;?></a>
                        </li>
                    </ul>

                    <a href="<?php echo base_url('auth/edit_user/'.$id) ?>" class="btn btn-primary btn-block"><b>Edit</b></a>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

            <!-- About Me Box -->
            
        
    </div><!-- /.row -->

</section>