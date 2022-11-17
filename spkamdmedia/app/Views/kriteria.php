<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo view('bagianhead') ?>
</head>
<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <?php echo view('bagiannavigasi') ?>
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Data Kriteria</h1>            
                    </div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <button data-toggle="modal" data-target="#tambah" class="btn btn-primary">Tambah Data Baru</button>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="table-1">
                                                <thead>
                                                    <tr>
                                                        <th>Kriteria</th>
                                                        <th>Kategori</th>
                                                        <th>Bobot (%)</th>
                                                        <th>#</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($data as $d) {?>
                                                        <tr>
                                                            <td><?php echo $d['kriteria'] ?></td>
                                                            <td><?php echo $d['kategori'] ?></td>
                                                            <td><?php echo $d['bobot'] ?></td>
                                                            <td><button data-toggle="modal" data-target="#detail<?php echo $d['idkriteria'] ?>" class="btn btn-warning btn-sm">Edit Data</button></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <?php echo view('bagianfooter') ?>
        </div>
    </div>
    <?php echo view('bagianscript') ?>
</body>
<div class="modal fade" tabindex="-1" role="dialog" id="tambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url('kriteria/simpan') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kriteria</label>
                        <input type="text" class="form-control form-control-sm" name="kriteria" placeholder="Nama Kriteria">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control form-control-sm" name="kategori" required>
                            <option>Cost</option>
                            <option>Benefit</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Bobot</label>
                        <input type="text" class="form-control form-control-sm" name="bobot" placeholder="Nomor Bobot" required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php foreach ($data as $d) {?>
    <div class="modal fade" tabindex="-1" role="dialog" id="detail<?php echo $d['idkriteria'] ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Detail Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php echo base_url('kriteria/ubah') ?>">
                    <input type="hidden" name="id" value="<?php echo $d['idkriteria'] ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Kriteria</label>
                            <input type="text" class="form-control form-control-sm" name="kriteria" placeholder="Nama Kriteria" value="<?php echo $d['kriteria'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control form-control-sm" name="kategori" required>
                                <option <?php if($d['kategori'] == 'Cost'){echo "selected";} ?>>Cost</option>
                                <option <?php if($d['kategori'] == 'Benefit'){echo "selected";} ?>>Benefit</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Bobot</label>
                            <input type="text" class="form-control form-control-sm" name="bobot" placeholder="Nomor Bobot" required onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo $d['bobot'] ?>">
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
</html>