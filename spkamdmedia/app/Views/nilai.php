<?php
$db = db_connect();
$bul = [1 => 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
?>
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
            <h1>Data Penilaian</h1>            
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <form method="post" action="<?php echo base_url('nilai/tampil') ?>">
                      <div class="row">
                        <div class="form-group col-4">
                          <h6>Pilih Periode Penilaian</h6>
                        </div>
                        <div class="form-group col-4">
                          <select class="form-control form-control-sm" name="bulan" required onchange="this.form.submit();">
                            <?php for ($i=1; $i <= count($bul); $i++) {?>
                              <option value="<?php echo $i ?>" <?php if($bulan == $i){echo "selected";} ?>><?php echo $bul[$i] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="form-group col-4">
                          <select class="form-control form-control-sm" name="tahun" required onchange="this.form.submit();">
                            <?php for ($i=2021; $i <= date('Y'); $i++) {?>
                              <option value="<?php echo $i ?>" <?php if($tahun == $i){echo "selected";} ?>><?php echo $i ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th>Karyawan</th>
                            <?php foreach ($kriteria as $k) {?>
                              <th><?php echo $k['kriteria'] ?></th>
                            <?php } ?>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($data as $d) {?>
                            <tr>
                              <td>
                                <?php echo $d['nama'] ?><br>
                                <small><?php echo $d['nik'] ?></small>
                              </td>
                              <?php
                              foreach ($kriteria as $k) {
                                $nilai = "";
                                $indikator = $db->query("select * from indikator where idkriteria = '".$k['idkriteria']."' order by nilai asc")->getResultArray();
                                $cek = $db->query("select nilai from nilai where periode = '".$bul[$bulan]." ".$tahun."' and idkriteria = '".$k['idkriteria']."' and idkaryawan = '".$d['idkaryawan']."'")->getResultArray();
                                if(count($cek) > 0){
                                  $nilai = $db->query("select nilai from nilai where periode = '".$bul[$bulan]." ".$tahun."' and idkriteria = '".$k['idkriteria']."' and idkaryawan = '".$d['idkaryawan']."'")->getResultArray();
                                  $nilai = $db->query("select idindikator from indikator where idkriteria = '".$k['idkriteria']."' and nilai = '".$nilai[0]['nilai']."'")->getResultArray();
                                  $nilai = $nilai[0]['idindikator'];
                                }
                                ?>
                                <td>
                                  <form action="<?php echo base_url('nilai/simpan/'.$k['idkriteria']) ?>" method="post">
                                    <input type="hidden" name="idkaryawan" value="<?php echo $d['idkaryawan'] ?>">
                                    <input type="hidden" name="periode" value="<?php echo $bul[$bulan]." ".$tahun ?>">
                                    <div class="col-12">
                                      <select class="form-control form-control-sm" name="nilai" required onchange="this.form.submit();">
                                        <?php foreach ($indikator as $i) {?>
                                          <option <?php if($nilai == $i['idindikator']){echo "selected";} ?> value="<?php echo $i['nilai'] ?>"><?php echo $i['indikator'] ?></option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                  </form>
                                </td>
                              <?php } ?>
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
</html>