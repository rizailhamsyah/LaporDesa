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
                        <form action="<?= base_url(); ?>users/simpan" method="post" enctype="multipart/form-data">
                        <div class="body">
                            <input type="hidden" name="ID" value="<?= $kode; ?>">
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="file" name="Photo" class="form-control" required>
                                            <label class="form-label" style="top: -22px; font-size: 13px;">Photo Profile</label>
                                        </div>
                                    </div>
                                </div>
                                </div> 
                                <div class="row">
                            <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="NIK" class="form-control" required>
                                            <label class="form-label">NIK</label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                            <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="Nama" class="form-control" required>
                                            <label class="form-label">Nama</label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="email" name="Email" class="form-control" required>
                                            <label class="form-label">Email</label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="password" name="Password" class="form-control" required>
                                            <label class="form-label">Password</label>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="Tempat_Lahir" class="form-control" required>
                                            <label class="form-label">Tempat Lahir</label>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="date" name="Tanggal_Lahir" class="form-control" required>
                                            <label class="form-label" style="top: -22px; font-size: 13px;">Tanggal Lahir</label>
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
                                        <option value="Admin">Admin</option>
                                        <option value="Penulis">Penulis</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                                </div>
                            <div class="row">
                        <div class="col-sm-3">
                            <div class="form-label" style="top: -22px; font-size: 13px; color: #aaa; margin-bottom: 5px;">Active?</div>
                                <div class="switch">
                                    <label><input type="checkbox" name="Active" value="1"><span class="lever switch-col-blue"></span></label>
                                </div>
                        </div>
                    </div>
                            <div class="row">
                        <div class="col-sm-12">
                        <input type="submit" class="btn btn-lg btn-primary m-t-15 waves-effect" value="Simpan">
                    </div>
                    </div>
                </div>
                        </div>
                        </form>
    </section>