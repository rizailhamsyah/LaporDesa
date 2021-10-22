<!-- Ckeditor -->
    <script src="<?= base_url(); ?>assets/plugins/ckeditor/ckeditor.js"></script>
    <script src="<?= base_url(); ?>assets/js/pages/forms/editors.js"></script>
    
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
                        <form action="<?= base_url(); ?>profile/edit" method="post" enctype="multipart/form-data">
                        <div class="body">
                            <?= $this->session->flashdata('save'); ?>
                            <div class="row">
                                <input type="hidden" name="ID" value="<?= $profile['ID'] ?>">
                            <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="Nama_Desa" value="<?= $profile['Nama_Desa']; ?>" class="form-control" required>
                                            <label class="form-label">Nama Desa</label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                        <div class="form-line">
                                        <label class="form-label" style="top: -22px; font-size: 13px;">Sejarah</label>
                                        <textarea id="ckeditor" name="Sejarah" required>
                                            <?= $profile['Sejarah']; ?>
                                        </textarea>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                        <div class="form-line">
                                        <label class="form-label" style="top: -22px; font-size: 13px;">Visi</label>
                                        <textarea id="ckeditor1" name="Visi" required>
                                            <?= $profile['Visi']; ?>
                                        </textarea>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                        <div class="form-line">
                                        <label class="form-label" style="top: -22px; font-size: 13px;">Misi</label>
                                        <textarea id="ckeditor2" name="Misi" required>
                                            <?= $profile['Misi']; ?>
                                        </textarea>
                                    </div>
                                </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                        <div class="form-line">
                                        <label class="form-label" style="top: -22px; font-size: 13px;">Program Kerja</label>
                                        <textarea id="ckeditor3" name="Program_Kerja" required>
                                            <?= $profile['Program_Kerja']; ?>
                                        </textarea>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <textarea rows="4" name="Alamat_Desa" class="form-control no-resize" required><?= $profile['Alamat_Desa']; ?></textarea>
                                            <label class="form-label">Alamat Desa</label>
                                        </div>
                                    </div>
                                </div>
                                </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" value="<?= $profile['Kecamatan']; ?>" name="Kecamatan" class="form-control" required>
                                            <label class="form-label">Kecamatan</label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" value="<?= $profile['Kabupaten']; ?>" name="Kabupaten" class="form-control" required>
                                            <label class="form-label">Kabupaten / Kota</label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            <div class="row">
                                    <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line" style="border-bottom: none;">
                                    <label class="form-label" style="top: -22px; font-size: 13px;">Provinsi</label>
                                    <select class="form-control show-tick" style="top: -0px; position: absolute; border-bottom: 1px solid #ccc; margin-left: 0px;" name="Provinsi" required>
                                        <option value="<?= $profile['Provinsi']; ?>"><?= $profile['Provinsi']; ?></option>
                                        <option value="Aceh">Aceh</option>
                                        <option value="Bali">Bali</option>
                                        <option value="Bali">Bali</option>
                                        <option value="Banten">Banten</option>
                                        <option value="Bengkulu">Bengkulu</option>
                                        <option value="Daerah Istimewa Yogyakarta">Daerah Istimewa Yogyakarta</option>
                                        <option value="DKI Jakarta">DKI Jakarta</option>
                                        <option value="Gorontalo">Gorontalo</option>
                                        <option value="Jambi">Jambi</option>
                                        <option value="Jawa Barat">Jawa Barat</option>
                                        <option value="Jawa Tengah">Jawa Tengah</option>
                                        <option value="Jawa Timur">Jawa Timur</option>
                                        <option value="Kalimantan Barat">Kalimantan Barat</option>
                                        <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                                        <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                                        <option value="Kalimantan Timur">Kalimantan Timur</option>
                                        <option value="Kalimantan Utara">Kalimantan Utara</option>
                                        <option value="Kepulauan Bangka Belitung">Kepulauan Bangka Belitung</option>
                                        <option value="Kepulauan Riau">Kepulauan Riau</option>
                                        <option value="Lampung">Lampung</option>
                                        <option value="Maluku">Maluku</option>
                                        <option value="Maluku Utara">Maluku Utara</option>
                                        <option value="Maluku">Maluku</option>
                                        <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                                        <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                                        <option value="Papua">Papua</option>
                                        <option value="Papua Barat">Papua Barat</option>
                                        <option value="Riau">Riau</option>
                                        <option value="Sulawesi Barat">Sulawesi Barat</option>
                                        <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                                        <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                                        <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                                        <option value="Sulawesi Utara">Sulawesi Utara</option>
                                        <option value="Sumatra Barat">Sumatra Barat</option>
                                        <option value="Sumatra Selatan">Sumatra Selatan</option>
                                        <option value="Sumatra Utara">Sumatra Utara</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                                </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" value="<?= $profile['Negara']; ?>" name="Negara" class="form-control" required>
                                            <label class="form-label">Negara</label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" value="<?= $profile['Kode_Pos']; ?>" name="Kode_Pos" class="form-control" required>
                                            <label class="form-label">Kode Pos</label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" value="<?= $profile['No_Whatsapp']; ?>" name="No_Whatsapp" class="form-control" required>
                                            <label class="form-label">No Whatsapp</label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" value="<?= $profile['Email']; ?>" name="Email" class="form-control" required>
                                            <label class="form-label">Email</label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" value="<?= $profile['Instagram']; ?>" name="Instagram" class="form-control" required>
                                            <label class="form-label">Instagram</label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                        <div class="row">
                                    <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <textarea rows="4" name="Embed_Peta" class="form-control no-resize" required><?= $profile['Embed_Peta']; ?></textarea>
                                            <label class="form-label">Embed Peta</label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                    <div class="row">
                        <div class="col-sm-12">
                        <input type="submit" class="btn btn-lg bg-<?= $template['warna']?> m-t-15 waves-effect" value="Simpan">
                    </div>
                    </div>
                        </div>
                        </form>
    </section>
    <script src="<?= base_url(); ?>assets/js/pages/index.js"></script>
    <script src="<?= base_url(); ?>assets/js/pages/forms/advanced-form-elements.js"></script>

    <!-- Custom Js -->
    <script src="<?= base_url(); ?>assets/js/admin.js"></script>
    <script src="<?= base_url(); ?>assets/js/pages/forms/editors.js"></script>
    <script>
        CKEDITOR.replace('ckeditor');
        CKEDITOR.replace('ckeditor1');
        CKEDITOR.replace('ckeditor2');
        CKEDITOR.replace('ckeditor3');

    </script>