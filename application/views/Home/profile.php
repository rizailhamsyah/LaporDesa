<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    <?= $title; ?>
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <?= $title; ?>
                            </h2>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                            <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                                </ul>
                                </div>
                        </div>
                            <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="profile_settings">
                        <form action="<?= base_url(); ?>Home/update" method="post" enctype="multipart/form-data">
                        <div class="body">
                            <?= $this->session->flashdata('save'); ?>
                            <input type="hidden" name="ID" value="<?= $this->session->userdata('login')['id']; ?>">
                            <div class="row">
                                <div class="col-lg-3">
                                        <a href="javascript:void(0);" class="thumbnail">
                                        <img src="<?= base_url(); ?>assets/images/uploads/Profile/<?= $this->userdata->Photo ?>" class="img-responsive">
                                        </a>
                                    </div>
                            </div>
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="file" name="Photo" class="form-control">
                                            <label class="form-label" style="top: -22px; font-size: 13px;">Photo Profile</label>
                                        </div>
                                    </div>
                                </div>
                                </div> 
                                <div class="row">
                            <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" value="<?= $this->userdata->Nama_Depan ?>" name="Nama_Depan" class="form-control" required>
                                            <label class="form-label">Nama Depan</label>
                                        </div>
                                    </div>
                                </div>
                            <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" value="<?= $this->userdata->Nama_Belakang ?>" name="Nama_Belakang" class="form-control" required>
                                            <label class="form-label">Nama Belakang</label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="email" value="<?= $this->userdata->Email ?>" name="Email" class="form-control" required>
                                            <label class="form-label">Email</label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" value="<?= $this->userdata->Keterangan ?>" name="Keterangan" class="form-control">
                                            <label class="form-label">Keterangan</label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            <div class="row">
                                    <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line" style="border-bottom: none;">
                                    <label class="form-label" style="top: -22px; font-size: 13px;">Status</label>
                                    <select class="form-control show-tick" style="top: -0px; position: absolute; border-bottom: 1px solid #ccc; margin-left: 0px;" name="Status" required>
                                        <option value="Admin" <?php if ($this->userdata->Status == "Admin") {echo "selected";};?>>Admin</option>
                                        <option value="Penulis" <?php if ($this->userdata->Status == "Penulis") {echo "selected";};?>>Penulis</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                                </div>
                            <div class="row">
                                    <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <textarea rows="4" name="Deskripsi" class="form-control no-resize" required><?= $this->userdata->Deskripsi ?></textarea>
                                            <label class="form-label">Deskripsi</label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            <div class="row">
                    </div>
                            <div class="row">
                        <div class="col-sm-12">
                        <input type="submit" class="btn btn-lg bg-<?= $template['warna'] ?> m-t-15 waves-effect" value="Simpan">
                    </div>
                    </div>
                </div>
                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                        <div class="body">
                                            <form action="#" method="post">
                                            <div class="row">
                                    <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="password" name="Password_Lama" class="form-control" required>
                                            <label class="form-label">Password Lama</label>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="password" name="Password_Baru" class="form-control" required>
                                            <label class="form-label">Password Baru</label>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="password" name="Password_Baru2" class="form-control" required>
                                            <label class="form-label">Konfirmasi Password</label>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                    <input type="submit" class="btn btn-lg bg-<?= $template['warna'] ?> m-t-15 waves-effect" value="CHANGE PASSWORD">
                                </div>
                                </div>
                                </form>
                                        </div>
                                    </div>
                            </div>
                        
    </section>