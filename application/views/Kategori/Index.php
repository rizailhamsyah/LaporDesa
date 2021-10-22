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
                            <i class="material-icons col-green">create_new_folder</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Kategori</div>
                            <div class="number"><?= $hitung_kategori; ?> Kategori</div>
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
                            <button type="button" class="btn btn-block bg-<?= $template['warna']?> waves-effect" data-toggle="modal" data-target="#addModal" title="Tambah Data">
                                <i class="material-icons">add</i>
                                <span>Tambah Data</span>
                            </button>
                        </div>
                            </div>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                            	<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th width="50px">#</th>
                                            <th>Kategori</th>
                                            <th width="150px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i=1; foreach ($kategori as $kate): ?>
                                            
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $kate['Nama_Kategori'] ?></td>
                                        	<td>
                                				<button type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#editModal<?= $kate['ID']  ?>" title="Edit Data">
                                    			<i class="material-icons">border_color</i>
                                				</button>
                                				<button type="button" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#deleteModal<?= $kate['ID']  ?>" title="Delete Data">
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

    <!-- Default Size -->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Tambah <?= $title; ?></h4>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url(); ?>kategori/simpan" method="post">
                                <div class="row">
                                    <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="Nama_Kategori" class="form-control" required>
                                            <label class="form-label">Nama Kategori</label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn bg-<?= $template['warna']?> waves-effect">TAMBAH DATA</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

    <?php foreach ($kategori as $ka): ?>
        <!-- Default Size -->
            <div class="modal fade" id="editModal<?= $ka['ID']  ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Edit <?= $title; ?> <?= $ka['Nama_Kategori'] ?></h4>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url(); ?>kategori/update/<?= $ka['ID']; ?>" method="post">
                                <div class="row">
                                    <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="Nama_Kategori" class="form-control" value="<?= $ka['Nama_Kategori'] ?>" required>
                                            <label class="form-label">Nama Kategori</label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success waves-effect">EDIT DATA</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>

    <?php foreach ($kategori as $kat): ?>
        <!-- Default Size -->
            <div class="modal fade" id="deleteModal<?= $kat['ID']  ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Delete <?= $title; ?> <?= $kat['Nama_Kategori'] ?></h4>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url(); ?>kategori/delete/<?= $kat['ID']; ?>" method="post">
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