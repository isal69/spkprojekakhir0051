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
                        <h2>Data Karyawan</h2>
                        <small>Pengolahan data karyawan, pilih tombol <code>Tambah Data</code> untuk menambah dan pilih tombol <code>Detail</code> untuk mengubah data</small>
                    </div>
                    <div class="page-breadcrumb">
                        <nav class="c_breadcrumbs">
                            <ul>
                                <li><a href="<?php echo base_url('admin') ?>">Dashboard</a></li>
                                <li><a href="<?php echo base_url('karyawan') ?>">Data Karyawan</a></li>
                                <li class="active"><a href="<?php echo base_url('karyawan/add') ?>">Tambah Data Baru</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="c_panel">
                    <div class="c_title">
                        <h2>Data Karyawan</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="c_content">
                        <form action="<?php echo base_url('karyawan/save') ?>" method="post">
                            <div class="form-group">
                                <label>NIP</label>
                                <input type="text" class="form-control input-sm" name="nip" placeholder="Nomor Induk Pegawai (NIP)">
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control input-sm" name="nama" placeholder="Nama Lengkap" required>
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text" class="form-control input-sm" name="jabatan" placeholder="Jabatan Pegawai" required>
                            </div>
                            <div class="form-group">
                                <label>Golongan</label>
                                <input type="text" class="form-control input-sm" name="golongan" placeholder="Golongan Pegawai">
                            </div>
                            <hr>
                            <button type="button" class="btn btn-danger btn-sm btn-flat" onclick="window.location.href='<?php echo base_url('karyawan') ?>'"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
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