<header class="main-header">
    <a href="<?php echo site_url('dashboard'); ?> " class="logo">
        <span class="logo-mini"><b>SPPD</b></span>
        <span class="logo-lg"><b>SPPD</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-calendar"></i>
                        <span> <?php echo tanggal_new(); ?></span>
                    </a>                    
                </li>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url('assets/img/avatar5.png'); ?>" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"><?php echo $this->session->userdata('username'); ?> </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo base_url('assets/img/avatar5.png'); ?>" class="img-circle" alt="User Image" />
                            <p>
                                <?php
                                $namadepan = $this->session->userdata('first_name');
                                $namabelakang = $this->session->userdata('last_name');
                                echo $namadepan, ' ', $namabelakang
                                ?> 
                                <small>Last Login , <?php echo tgl_lengkap($this->session->userdata('old_last_login')); ?></small>
                            </p>
                        </li>
                        <!-- Menu Body -->                                    
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?php echo site_url('auth/profile/' . $this->session->userdata('user_id')); ?>" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo site_url('auth/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>                        
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>
