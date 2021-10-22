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
                        <form action="<?= base_url(); ?>tema/edit" method="post" enctype="multipart/form-data">
                        <div class="body">
                        <div class="row">
                            <div class="col-lg-12">
                                <?= $this->session->flashdata('save'); ?>
                            </div>      
                        </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row">
                                <div class="col-xs-6 col-md-6">
                                    <a href="javascript:void(0);" class="thumbnail">
                                        <img src="<?= base_url(); ?>assets/images/uploads/Tema/<?= $template['icon']; ?>" class="img-responsive">
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="file" name="Icon" class="form-control">
                                            <label class="form-label" style="top: -22px; font-size: 13px;">Icon</label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                                <div class="col-lg-6">
                                   <div class="row">
                                <div class="col-xs-6 col-md-6">
                                    <a href="javascript:void(0);" class="thumbnail">
                                        <img src="<?= base_url(); ?>assets/images/uploads/Tema/<?= $template['logo']; ?>" class="img-responsive">
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="file" name="Logo_Desa" class="form-control">
                                            <label class="form-label" style="top: -22px; font-size: 13px;">Logo Desa</label>
                                        </div>
                                    </div>
                                </div>
                                </div> 
                                </div>
                            </div>
                                  <div class="row">
                                <div class="col-lg-6">
                                    <div class="row">
                                <div class="col-xs-6 col-md-6">
                                    <a href="javascript:void(0);" class="thumbnail">
                                        <img src="<?= base_url(); ?>assets/images/uploads/Tema/<?= $template['profile']; ?>" class="img-responsive">
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line" style="vertical-align: bottom;">
                                            <input type="file" name="Background_Profile" class="form-control">
                                            <label class="form-label" style="top: -22px; font-size: 13px;">Background Profile</label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                                <div class="col-lg-6">
                                   <div class="row">
                                <div class="col-xs-6 col-md-6">
                                    <a href="javascript:void(0);" class="thumbnail">
                                        <img src="<?= base_url(); ?>assets/images/uploads/Tema/<?= $template['login']; ?>" class="img-responsive">
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="file" name="Background_Login" class="form-control">
                                            <label class="form-label" style="top: -22px; font-size: 13px;">Background Login</label>
                                        </div>
                                    </div>
                                </div>
                                </div> 
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line" style="border-bottom: none;">
                                    <label class="form-label" style="top: -22px; font-size: 13px;">Warna Tema</label>
                                    <select class="form-control show-tick" style="top: -0px; position: absolute; border-bottom: 1px solid #ccc; margin-left: 0px;" name="Warna_Tema">
                                        <option value="<?= $template['warna']; ?>"><?= $template['warna']; ?></option>
                                        <option value="red">Red</option>
                                        <option value="pink">Pink</option>
                                        <option value="purple">Purple</option>
                                        <option value="deep-purple">Deep Purple</option>
                                        <option value="indigo">Indigo</option>
                                        <option value="blue">Blue</option>
                                        <option value="light-blue">Light Blue</option>
                                        <option value="cyan">Cyan</option>
                                        <option value="teal">Teal</option>
                                        <option value="green">Green</option>
                                        <option value="light-green">Light Green</option>
                                        <option value="lime">Lime</option>
                                        <option value="yellow">Yellow</option>
                                        <option value="amber">Amber</option>
                                        <option value="orange">Orange</option>
                                        <option value="deep-orange">Deep Orange</option>
                                        <option value="brown">Brown</option>
                                        <option value="grey">Grey</option>
                                        <option value="blue-grey">Blue Grey</option>
                                        <option value="black">Black</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                                </div>
                                <div class="row">
                        <div class="col-sm-12">
                        <input type="submit" class="btn btn-lg bg-<?= $template['warna']?> m-t-15 waves-effect" value="UPDATE">
                    </div>
                    </div>
                                <div class="clearfix row">
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                    <div class="demo-color-box bg-red">
                                        <div class="color-name">RED</div>
                                        <div class="color-code">#F44336</div>
                                        <div class="color-class-name">bg-red</div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                    <div class="demo-color-box bg-pink">
                                        <div class="color-name">PINK</div>
                                        <div class="color-code">#E91E63</div>
                                        <div class="color-class-name">bg-pink</div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                    <div class="demo-color-box bg-purple">
                                        <div class="color-name">PURPLE</div>
                                        <div class="color-code">#9C27B0</div>
                                        <div class="color-class-name">bg-purple</div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                    <div class="demo-color-box bg-deep-purple">
                                        <div class="color-name">DEEP PURPLE</div>
                                        <div class="color-code">#673AB7</div>
                                        <div class="color-class-name">bg-deep-purple</div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                    <div class="demo-color-box bg-indigo">
                                        <div class="color-name">INDIGO</div>
                                        <div class="color-code">#3F51B5</div>
                                        <div class="color-class-name">bg-indigo</div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                    <div class="demo-color-box bg-blue">
                                        <div class="color-name">BLUE</div>
                                        <div class="color-code">#2196F3</div>
                                        <div class="color-class-name">bg-blue</div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                    <div class="demo-color-box bg-light-blue">
                                        <div class="color-name">LIGHT BLUE</div>
                                        <div class="color-code">#03A9F4</div>
                                        <div class="color-class-name">bg-light-blue</div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                    <div class="demo-color-box bg-cyan">
                                        <div class="color-name">CYAN</div>
                                        <div class="color-code">#00BCD4</div>
                                        <div class="color-class-name">bg-cyan</div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                    <div class="demo-color-box bg-teal">
                                        <div class="color-name">TEAL</div>
                                        <div class="color-code">#009688</div>
                                        <div class="color-class-name">bg-teal</div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                    <div class="demo-color-box bg-green">
                                        <div class="color-name">GREEN</div>
                                        <div class="color-code">#4CAF50</div>
                                        <div class="color-class-name">bg-green</div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                    <div class="demo-color-box bg-light-green">
                                        <div class="color-name">LIGHT GREEN</div>
                                        <div class="color-code">#8BC34A</div>
                                        <div class="color-class-name">bg-light-green</div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                    <div class="demo-color-box bg-lime">
                                        <div class="color-name">LIME</div>
                                        <div class="color-code">#CDDC39</div>
                                        <div class="color-class-name">bg-lime</div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                    <div class="demo-color-box bg-yellow">
                                        <div class="color-name">YELLOW</div>
                                        <div class="color-code">#FFEB3B</div>
                                        <div class="color-class-name">bg-yellow</div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                    <div class="demo-color-box bg-amber">
                                        <div class="color-name">AMBER</div>
                                        <div class="color-code">#FFC107</div>
                                        <div class="color-class-name">bg-amber</div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                    <div class="demo-color-box bg-orange">
                                        <div class="color-name">ORANGE</div>
                                        <div class="color-code">#FF9800</div>
                                        <div class="color-class-name">bg-orange</div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                    <div class="demo-color-box bg-deep-orange">
                                        <div class="color-name">DEEP ORANGE</div>
                                        <div class="color-code">#FF5722</div>
                                        <div class="color-class-name">bg-deep-orange</div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                    <div class="demo-color-box bg-brown">
                                        <div class="color-name">BROWN</div>
                                        <div class="color-code">#795548</div>
                                        <div class="color-class-name">bg-brown</div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                    <div class="demo-color-box bg-grey">
                                        <div class="color-name">GREY</div>
                                        <div class="color-code">#9E9E9E</div>
                                        <div class="color-class-name">bg-grey</div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                    <div class="demo-color-box bg-blue-grey">
                                        <div class="color-name">BLUE GREY</div>
                                        <div class="color-code">#607D8B</div>
                                        <div class="color-class-name">bg-blue-grey</div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                    <div class="demo-color-box bg-black">
                                        <div class="color-name">BLACK</div>
                                        <div class="color-code">#000000</div>
                                        <div class="color-class-name">bg-black</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
    </section>