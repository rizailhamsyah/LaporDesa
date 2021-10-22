<section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info" style="background: url('<?= base_url(); ?>assets/images/uploads/Tema/<?= $template['profile']; ?>');">
                <div class="image">
                    <img src="<?= base_url(); ?>assets/images/uploads/Profile/<?= $this->userdata->Photo ?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $this->userdata->Nama ?></div>
                    <div class="email"><?= $this->userdata->Email ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?= base_url(); ?>Home/profile"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url(); ?>logout"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li <?php if($title=='Dashboard'){echo 'class="active"';} ?>>
                        <a href="<?= base_url(); ?>">
                            <i class="material-icons">dashboard</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li <?php if($title=='Postingan'){echo 'class="active"';} ?>>
                        <a href="<?= base_url(); ?>Postingan">
                            <i class="material-icons">timeline</i>
                            <span>Postingan</span>
                        </a>
                    </li>
                    <li <?php if($title=='Data Kategori'){echo 'class="active"';} ?>>
                        <a href="<?= base_url(); ?>Kategori">
                            <i class="material-icons">create_new_folder</i>
                            <span>Data Kategori</span>
                        </a>
                    </li>
                    <li <?php if($title=='Data Users'){echo 'class="active"';} ?>>
                        <a href="<?= base_url(); ?>Users">
                            <i class="material-icons">person</i>
                            <span>Data Users</span>
                        </a>
                    </li>
                    <li <?php if($title=='Profile Desa'){echo 'class="active"';} ?>>
                        <a href="<?= base_url(); ?>Profile">
                            <i class="material-icons">home</i>
                            <span>Profile Desa</span>
                        </a>
                    </li>
                    <li <?php if($title=='Tema'){echo 'class="active"';} ?>>
                        <a href="<?= base_url(); ?>Tema">
                            <i class="material-icons">palette</i>
                            <span>Tema</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2021 <a href="javascript:void(0);"><?= $profile['Nama_Desa']; ?></a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>