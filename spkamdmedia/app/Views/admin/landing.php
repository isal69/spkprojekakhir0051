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
                        <h2>Dashboard</h2>
                        <small>Statistik Data Sistem</small>
                    </div>
                    <div class="page-breadcrumb">
                        <nav class="c_breadcrumbs">
                            <ul>
                                <li><a href="<?php echo base_url('admin') ?>">Dashboard</a></li>
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
                        
                    </div>
                </div>
            </section>
        </section>
    </section>
    <?php echo view('admin/bagianscript') ?>
</body>
</html>