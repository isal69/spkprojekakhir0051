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
                                <li class="active"><a href="<?php echo base_url('kriteria') ?>">Data Kriteria</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="c_panel">
                    <div class="c_title">
                        <h2>Data Kriteria</h2>
                        <ul class="nav navbar-right panel_options">
                            <button type="button" class="btn btn-success btn-sm" onclick="window.location.href='<?php echo base_url('kriteria/add') ?>'" style="float: right;"><i class="fa fa-plus-square"></i> Tambah Data</button>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="c_content">
                        <table id="example" class="table table-striped table-bordered" style="border-spacing:0px; width:100%">
                            <thead>
                                <tr>
                                    <th>Kriteria</th>
                                    <th>Kategori</th>
                                    <th>Bobot</th>
                                    <th>**</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $d) {?>
                                    <tr>
                                        <td><?php echo $d['kriteria'] ?></td>
                                        <td align="center"><?php echo $d['kategori'] ?></td>
                                        <td align="center"><?php echo $d['bobot'] ?></td>
                                        <td align="center"><button type="button" class="btn btn-warning btn-sm" onclick="window.location.href='<?php echo base_url('kriteria/detail/'.$d['kodekriteria']) ?>'">Detail</button></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </section>
    </section>
    <?php echo view('admin/bagianscript') ?>
</body>
</html>