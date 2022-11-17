<?php
$db = db_connect();
$bulan = array('1' => 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
?>
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
                        <h2>Data Skema</h2>
                        <small>Pengolahan data skema, pilih periode tertentu untuk menampilkan detail skema</small>
                    </div>
                    <div class="page-breadcrumb">
                        <nav class="c_breadcrumbs">
                            <ul>
                                <li><a href="<?php echo base_url('admin') ?>">Dashboard</a></li>
                                <li class="active"><a href="<?php echo base_url('skema') ?>">Data Skema</a></li>
                            </ul>                            
                        </nav>
                    </div>
                </div>
                <div class="c_panel">
                    <div class="c_title">
                        <h2>Data Skema</h2>                        
                        <div class="clearfix"></div>
                        <form class="form-inline" action="<?php echo base_url('skema/show') ?>" method="post">
                            <div class="form-group">
                                <select class="form-control input-sm" name="tahun" required onchange="this.form.submit();">
                                    <?php for ($i=2020; $i <= date('Y'); $i++) { ?>
                                        <option <?php if($tahun == $i){echo "selected";} ?> value="<?php echo $i ?>"><?php echo $i ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="c_content">
                        <table id="example1" class="table table-striped table-bordered" style="border-spacing:0px; width:100%">
                            <thead>
                                <tr>
                                    <th width="10%">Periode</th>
                                    <th>Kriteria</th>
                                    <th width="5%">**</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($i=1; $i <= count($bulan) ; $i++) {
                                    $kriteria = "";
                                    $data = $db->query("select kriteria.* from skema join kriteria on skema.kodekriteria = kriteria.kodekriteria where skema.periode = '".$bulan[$i]." ".$tahun."' order by kriteria asc")->getResult();
                                    foreach ($data as $d) {
                                        $kriteria .= $d->kriteria;
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $bulan[$i] ?></td>
                                        <td><?php echo $kriteria ?></td>
                                        <td align="center"><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detail<?php echo $tahun.$i ?>">Detail</button></td>
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
<?php
$kriteria = $db->query("select * from kriteria order by kriteria asc")->getResult();
for ($i=1; $i <= count($bulan) ; $i++) {
    ?>
    <div class="modal" id="detail<?php echo $tahun.$i ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                    <h4 class="modal-title">Skema Kriteria Periode <?php echo $bulan[$i]." ".$tahun ?></h4>
                </div>
                <form action="<?php echo base_url('skema/save') ?>" method="post">
                    <input type="hidden" name="periode" value="<?php echo $bulan[$i]." ".$tahun ?>">
                    <div class="modal-body">
                        <?php
                        foreach ($kriteria as $k) {
                            $cek = $db->query("select * from skema where kodekriteria = '".$k->kodekriteria."' and periode = '".$bulan[$i]." ".$tahun."'")->getResult();
                            ?>
                            <label class="checkbox-inline">
                                <input type="checkbox" name="kriteria[]" id="inlineCheckbox1" <?php if(count($cek) > 0){echo "checked";} ?> value="<?php echo $k->kodekriteria ?>"><?php echo $k->kriteria ?>
                            </label>
                        <?php } ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm btn-raised rippler rippler-default" data-dismiss="modal">Batal</button>
                        <button type="sbumit" class="btn btn-primary btn-sm btn-raised rippler rippler-default" data-dismiss="modal">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
</html>