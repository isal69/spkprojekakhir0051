<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo view('admin/bagianhead') ?>
</head>
<body id="default-scheme">
    <section id="container">
        <?php echo view('admin/bagianheader') ?>
        <section id="main-content">
            <section class="wrapper">
                <div class="top-page-header">
                    <div class="page-title">
                        <h2>Data Kriteria</h2>
                        <small>Pengolahan data kriteria, pilih tombol <code>Tambah Data</code> untuk menambah dan pilih tombol <code>Detail</code> untuk mengubah data</small>
                    </div>
                    <div class="page-breadcrumb">
                        <nav class="c_breadcrumbs">
                            <ul>
                                <li><a href="<?php echo base_url('admin') ?>">Dashboard</a></li>
                                <li><a href="<?php echo base_url('kriteria') ?>">Data Kriteria</a></li>
                                <li class="active"><a href="<?php echo base_url('kriteria/detail/'.$data['kodekriteria']) ?>">Detail Data</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="c_panel">
                    <div class="c_title">
                        <h2>Data Kriteria</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="c_content">
                        <form action="<?php echo base_url('kriteria/change') ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $data['kodekriteria'] ?>">
                            <div class="form-group">
                                <label>Kriteria</label>
                                <input type="text" class="form-control input-sm" name="kriteria" placeholder="Nama Kriteria Lengkap" required value="<?php echo $data['kriteria'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control input-sm" name="kategori" required>
                                    <option <?php if($data['kategori'] == 'Cost'){echo "selected";} ?>>Cost</option>
                                    <option <?php if($data['kategori'] == 'Benefit'){echo "selected";} ?>>Benefit</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Bobot</label>
                                <input type="number" class="form-control input-sm" min="1" max="100" name="bobot" placeholder="Bobot Kriteria" value="<?php echo $data['bobot'] ?>">
                            </div>
                            <hr>
                            <button type="button" class="btn btn-danger btn-sm btn-flat" onclick="window.location.href='<?php echo base_url('kriteria') ?>'"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
                            <button type="submit" class="btn btn-primary btn-sm btn-flat" style="float: right;"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan Data</button>
                        </form>
                    </div>
                </div>
            </section>
        </section>
    </section>
    <?php echo view('admin/bagianscript') ?>
</body>
</html>