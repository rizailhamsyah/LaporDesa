<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    <?= $title; ?>
                </h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-4 hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons col-green">timeline</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Postingan</div>
                            <div class="number"><?= $hitung; ?> Postingan</div>
                        </div>
                    </div>

                </div>
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

                        <div class="header" style="border-bottom: none;">
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                            	<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th width="200px">Email</th>
                                            <th>Gambar</th>
                                            <th width="100px">Tanggal</th>
                                            <th>Lokasi</th>
                                            <th>Jenis Laporan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th width="200px">Email</th>
                                            <th>Gambar</th>
                                            <th width="100px">Tanggal</th>
                                            <th>Lokasi</th>
                                            <th>Jenis Laporan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i=1; foreach ($postingan as $post): ?>
                                            
                                        <tr>
                                            <td><a href="#" data-toggle="modal" data-target="#detailModal<?= $post['ID'];  ?>"><?= $i++; ?></a></td>
                                        	<td><a href="#" data-toggle="modal" data-target="#detailModal<?= $post['ID'];  ?>"><?= $post['Email']; ?></a></td>
                                            <td><img src="<?= base_url(); ?>assets/images/uploads/postingan/<?= $post['Gambar'] ?>" width="70px" height="70px"></td>
                                        	<td><a href="#" data-toggle="modal" data-target="#detailModal<?= $post['ID'];  ?>"><?= $post['Tanggal']; ?></a></td>
                                        	<td><a href="#" data-toggle="modal" data-target="#detailModal<?= $post['ID'];  ?>"><?= $post['Lokasi']; ?></a></td>
                                        	<td><a href="#" data-toggle="modal" data-target="#detailModal<?= $post['ID'];  ?>"><?= $post['Jenis_Laporan']; ?></a></td>
                                            <td><a href="#" data-toggle="modal" data-target="#detailModal<?= $post['ID'];  ?>"><?php if($post['Aktif']==1){echo "Posting";}else{echo "Blokir";} ?></a></td>
                                        	<td>
                                                <button type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#verifModal<?= $post['ID']  ?>" title="Verifikasi">
                                                <i class="material-icons">check_circle</i>
                                                </button>
                                				<button type="button" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#blokirModal<?= $post['ID'] ?>" title="Blokir">
                                                <i class="material-icons">report</i>
                                                </button>
                                        	</td>
                                        </tr>
                                        <?php 
                                    endforeach; 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>
    <?php foreach ($postingan as $pos): ?>
        <!-- Default Size -->
            <div class="modal fade" id="blokirModal<?= $pos['ID'] ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Blokir Postingan</h4>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url(); ?>Postingan/Blokir/<?= $pos['ID'] ?>" method="post">
                                <input type="hidden" name="ID" value="<?= $pos['ID'] ?>">
                                Apakah Anda Yakin Ingin Blokir Postingan Ini?
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger waves-effect">BLOKIR</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

            <?php foreach ($postingan as $pos): ?>
            <!-- Default Size -->
            <div class="modal fade" id="verifModal<?= $pos['ID'] ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Verifikasi Postingan</h4>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url(); ?>Postingan/Verifikasi/<?= $pos['ID'] ?>" method="post">
                                <input type="hidden" name="ID" value="<?= $pos['ID'] ?>">
                                Apakah Anda Yakin Ingin Verifikasi Postingan Ini?
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success waves-effect">VERIFIKASI</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

            <?php foreach ($postingan as $pos): ?>
                
            <!-- Large Size -->
            <div class="modal fade" id="detailModal<?= $pos['ID'];  ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Detail Postingan <?= $pos['Email'] ?></h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <img src="<?= base_url(); ?>assets/images/uploads/postingan/<?= $pos['Gambar'] ?>" class="img-thumbnail img-responsive">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <i class="material-icons m-t-10">favorite</i> <span class="icon-name m-l-5" style="position: absolute; margin-top: 15px;"><?= $this->db->get_where('lapor_likes', ['ID_Postingan' => $pos['ID']])->num_rows(); ?> Likes</span>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <i class="material-icons m-t-10">forum</i> <span class="icon-name m-l-5" style="position: absolute; margin-top: 15px;"><?= $this->db->get_where('lapor_komentar', ['ID_Postingan' => $pos['ID']])->num_rows(); ?> Comments</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th>Tanggal</th>
                                                        <td><?= date('d-m-Y', strtotime($pos["Tanggal"])); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Jam</th>
                                                        <td><?= date('H:i:s', strtotime($pos["Tanggal"])); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Lokasi</th>
                                                        <td><?= $pos['Lokasi']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Jenis Laporan</th>
                                                        <td><?= $pos['Jenis_Laporan']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Verifikasi</th>
                                                        <td><?= $pos['Jenis_Laporan']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Status</th>
                                                        <td><?php if($pos['Aktif']==1){echo "Posting";}else{echo "Blokir";} ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Size Gambar</th>
                                                        <td><?= $pos['Size_Gambar'] ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                </div>
                        </div>
                        <h5 class="card-inside-title">Laporan Masyarakat</h5>
                        <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" disabled><?= $post['Status'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <?php endforeach; ?>