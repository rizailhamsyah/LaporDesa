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
                            <i class="material-icons col-green">people</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Users</div>
                            <div class="number"><?= $hitung_usr; ?> Orang</div>
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
                            <?= $this->session->flashdata('save'); ?>
                            <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 5px;">
                            <a href="<?= base_url(); ?>users/tambah_data" class="btn btn-block bg-<?= $template['warna']?> waves-effect">
                                <i class="material-icons">add</i>
                                <span>Tambah Data</span>
                            </a>
                        </div>
                            </div>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                            	<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th width="200px">NIK</th>
                                            <th width="200px">Nama</th>
                                            <th>Email</th>
                                            <th>Jabatan</th>
                                            <th>Active</th>
                                            <th width="250px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Jabatan</th>
                                            <th>Active</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i=1; foreach ($users as $user): ?>
                                            
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $user['NIK'] ?></td>
                                        	<td><?= $user['Nama'] ?></td>
                                        	<td><?= $user['Email']; ?></td>
                                        	<td><?= $user['Status']; ?></td>
                                            <td><?php if ($user['Active'] == 1){echo "Aktif";}elseif ($user['Active'] == 0) {echo "Tidak aktif";} ?></td>
                                        	<td>
                                				<a href="<?= base_url(); ?>users/edit_data/<?= $user['ID'] ?>" class="btn btn-success waves-effect" title="Edit Data">
                                    			<i class="material-icons">border_color</i>
                                				</a>
                                                <button type="button" class="btn btn-warning waves-effect" data-toggle="modal" data-target="#resetModal<?= $user['ID']  ?>" title="Reset Password">
                                                <i class="material-icons">cached</i>
                                                </button>
                                				<button type="button" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#deleteModal<?= $user['ID']  ?>" title="Delete Data">
                                                <i class="material-icons">delete_sweep</i>
                                                </button>
                                        	</td>
                                        </tr>
                                        <?php endforeach ?>
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
    <?php foreach ($users as $user): ?>
        <!-- Default Size -->
            <div class="modal fade" id="deleteModal<?= $user['ID']  ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Delete <?= $title; ?> <?= $user['Nama'] ?></h4>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url(); ?>users/delete/<?= $user['ID']; ?>" method="post">
                                Apakah Anda Yakin Ingin Menghapus Data Ini?
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger waves-effect">DELETE DATA</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>

    <?php foreach ($users as $user): ?>
        <!-- Default Size -->
            <div class="modal fade" id="resetModal<?= $user['ID']  ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Reset Password <?= $title; ?> <?= $user['Nama'] ?></h4>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url(); ?>users/reset/<?= $user['ID']; ?>" method="post">
                            <input type="hidden" name="ID" value="<?= $user['ID'] ?>">
                                Apakah Anda Yakin Ingin Reset Password User Data Ini?
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-warning waves-effect">RESET PASSWORD</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>