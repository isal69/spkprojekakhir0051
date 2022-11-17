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
            <h1>Data Analisa</h1>            
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <form method="post" action="<?php echo base_url('analisa/tampil') ?>">
                      <div class="row">
                        <div class="form-group col-4">
                          <h6>Pilih Periode Analisa</h6>
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
                    <div id="accordion">

                      <div class="accordion">
                        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-kriteria">
                          <h4>Data Kriteria</h4>
                        </div>
                        <div class="accordion-body collapse" id="panel-kriteria" data-parent="#accordion">
                          <div class="table-responsive">
                            <table class="table table-bordered table-md" id="table-1">
                              <thead>
                                <tr>
                                  <th>Kriteria</th>
                                  <th>Kategori</th>
                                  <th>Bobot</th>
                                  <th>Inisial</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                $x = 1;
                                foreach ($kriteria as $k) {
                                  ?>
                                  <tr>
                                    <td><?php echo $k['kriteria'] ?></td>
                                    <td><?php echo $k['kategori'] ?></td>
                                    <td><?php echo $k['bobot'] ?></td>
                                    <td><?php echo "C".$x ?></td>
                                  </tr>
                                  <?php 
                                  $x++;
                                }
                                ?>
                              </tbody>
                            </table>
                          </div>                          
                        </div>
                      </div>

                      <div class="accordion">
                        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-panilaian">
                          <h4>Data Penilaian</h4>
                        </div>
                        <div class="accordion-body collapse" id="panel-panilaian" data-parent="#accordion">
                          <div class="table-responsive">
                            <table class="table table-bordered table-md" id="table-1">
                              <thead>
                                <tr>
                                  <th>Karyawan</th>
                                  <?php for ($i=1; $i <= count($kriteria) ; $i++) {?>
                                    <th><?php echo "C".$i ?></th>
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
                                      $indikator = "-";
                                      $cek = $db->query("select nilai from nilai where periode = '".$bul[$bulan]." ".$tahun."' and idkriteria = '".$k['idkriteria']."' and idkaryawan = '".$d['idkaryawan']."'")->getResultArray();
                                      if(count($cek) > 0){
                                        $indikator = $db->query("select nilai from nilai where periode = '".$bul[$bulan]." ".$tahun."' and idkriteria = '".$k['idkriteria']."' and idkaryawan = '".$d['idkaryawan']."'")->getResultArray();
                                        $indikator = $db->query("select idindikator from indikator where idkriteria = '".$k['idkriteria']."' and nilai = '".$indikator[0]['nilai']."'")->getResultArray();
                                        $indikator = $db->query("select indikator from indikator where idindikator = '".$indikator[0]['idindikator']."'")->getResultArray()[0]['indikator'];
                                      }
                                      ?>
                                      <td><?php echo $indikator ?></td>
                                    <?php } ?>
                                  </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>

                      <div class="accordion">
                        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-matrik">
                          <h4>Matrik Nilai</h4>
                        </div>
                        <div class="accordion-body collapse" id="panel-matrik" data-parent="#accordion">
                          <div class="table-responsive">
                            <table class="table table-bordered table-md" id="table-1">
                              <thead>
                                <tr>
                                  <th>Karyawan</th>
                                  <?php for ($i=1; $i <= count($kriteria) ; $i++) {?>
                                    <th><?php echo "C".$i ?></th>
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
                                      $nilai = "-";
                                      $cek = $db->query("select nilai from nilai where periode = '".$bul[$bulan]." ".$tahun."' and idkriteria = '".$k['idkriteria']."' and idkaryawan = '".$d['idkaryawan']."'")->getResultArray();
                                      if(count($cek) > 0){
                                        $nilai = $db->query("select nilai from nilai where periode = '".$bul[$bulan]." ".$tahun."' and idkriteria = '".$k['idkriteria']."' and idkaryawan = '".$d['idkaryawan']."'")->getResultArray()[0]['nilai'];
                                      }
                                      ?>
                                      <td><?php echo $nilai ?></td>
                                    <?php } ?>
                                  </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>

                      <?php
                      $x = 0;
                      foreach ($kriteria as $k) {
                        $cek = $db->query("select nilai from nilai where periode = '".$bul[$bulan]." ".$tahun."' and idkriteria = '".$k['idkriteria']."'")->getResultArray();
                        if(count($cek) > 0){
                          $x++;
                        }
                      }
                      if($x == count($kriteria)){
                        ?>
                        <div class="accordion">
                          <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-normalisasi">
                            <h4>Normalisasi Nilai</h4>
                          </div>
                          <div class="accordion-body collapse" id="panel-normalisasi" data-parent="#accordion">
                            <div class="table-responsive">
                              <table class="table table-bordered table-md" id="table-1">
                                <thead>
                                  <tr>
                                    <th>Karyawan</th>
                                    <?php for ($i=1; $i <= count($kriteria) ; $i++) {?>
                                      <th><?php echo "C".$i ?></th>
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
                                        $nilai = "-";
                                        $cek = $db->query("select nilai from nilai where periode = '".$bul[$bulan]." ".$tahun."' and idkriteria = '".$k['idkriteria']."' and idkaryawan = '".$d['idkaryawan']."'")->getResultArray();
                                        if(count($cek) > 0){
                                          $nilai = $db->query("select min(nilai) as min, max(nilai) as max from nilai where periode = '".$bul[$bulan]." ".$tahun."' and idkriteria = '".$k['idkriteria']."'")->getResultArray();

                                          $x = $db->query("select nilai from nilai where periode = '".$bul[$bulan]." ".$tahun."' and idkriteria = '".$k['idkriteria']."' and idkaryawan = '".$d['idkaryawan']."'")->getResultArray()[0]['nilai'];
                                          if($k['kategori'] == 'Cost'){
                                            $nilai = $nilai[0]['min']/$x;
                                          }else{
                                            $nilai = $x/$nilai[0]['max'];
                                          }
                                        }
                                        ?>
                                        <td><?php echo number_format($nilai,2) ?></td>
                                      <?php } ?>
                                    </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      <?php } ?>

                      <?php
                      $cek = $db->query("select na from na where periode = '".$bul[$bulan]." ".$tahun."'")->getResultArray();
                      if(count($cek) > 0){
                        ?>
                        <div class="accordion">
                          <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-preferensi">
                            <h4>Nilai Preferensi</h4>
                          </div>
                          <div class="accordion-body collapse" id="panel-preferensi" data-parent="#accordion">
                            <div class="table-responsive">
                              <table class="table table-bordered table-md" id="table-1">
                                <thead>
                                  <tr>
                                    <th>Karyawan</th>
                                    <?php for ($i=1; $i <= count($kriteria) ; $i++) {?>
                                      <th><?php echo "C".$i ?></th>
                                    <?php } ?>
                                    <th>NA</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  foreach ($data as $d) {
                                    $na = 0;
                                    ?>
                                    <tr>
                                      <td>
                                        <?php echo $d['nama'] ?><br>
                                        <small><?php echo $d['nik'] ?></small>
                                      </td>
                                      <?php
                                      foreach ($kriteria as $k) {
                                        $nilai = 0;
                                        $cek = $db->query("select nilai from nilai where periode = '".$bul[$bulan]." ".$tahun."' and idkriteria = '".$k['idkriteria']."' and idkaryawan = '".$d['idkaryawan']."'")->getResultArray();
                                        if(count($cek) > 0){
                                          $nilai = $db->query("select min(nilai) as min, max(nilai) as max from nilai where periode = '".$bul[$bulan]." ".$tahun."' and idkriteria = '".$k['idkriteria']."'")->getResultArray();

                                          $x = $db->query("select nilai from nilai where periode = '".$bul[$bulan]." ".$tahun."' and idkriteria = '".$k['idkriteria']."' and idkaryawan = '".$d['idkaryawan']."'")->getResultArray()[0]['nilai'];
                                          if($k['kategori'] == 'Cost'){
                                            $nilai = ($nilai[0]['min']/$x) * $k['persentase'];
                                          }else{
                                            $nilai = ($x/$nilai[0]['max']) * $k['persentase'];
                                          }
                                        }
                                        $na += $nilai;
                                        ?>
                                        <td><?php echo number_format($nilai,2) ?></td>
                                      <?php } ?>
                                      <td><?php echo number_format($na,2) ?></td>
                                    </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>

                        <div class="accordion">
                          <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-ranking">
                            <h4>Perangkingan Nilai Akhir</h4>
                          </div>
                          <div class="accordion-body collapse" id="panel-ranking" data-parent="#accordion">
                            <div class="table-responsive">
                              <?php $data = $db->query("select na.na, karyawan.* from na join karyawan on na.idkaryawan = karyawan.idkaryawan where na.periode = '".$bul[$bulan]." ".$tahun."' order by na.na desc")->getResultArray(); ?>
                              <table class="table table-bordered table-md" id="table-1">
                                <thead>
                                  <tr>
                                    <th>Rank</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Jekel</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>NA</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $n = 1;
                                  $hasil1 = "";
                                  $hasil2 = "";
                                  $hasil3 = 0;
                                  foreach ($data as $d) {
                                    if($d['na'] > $hasil3){
                                      $hasil1 = $d['nama'];
                                      $hasil2 = $d['nik'];
                                      $hasil3 = number_format($d['na']*100,2);
                                    }
                                    ?>
                                    <tr>
                                      <td><?php echo $n ?></td>
                                      <td><?php echo $d['nik'] ?></td>
                                      <td><?php echo $d['nama'] ?></td>
                                      <td><?php echo $d['jekel'] ?></td>
                                      <td><?php echo $d['alamat'] ?></td>
                                      <td><?php echo $d['telepon'] ?></td>
                                      <td><?php echo number_format($d['na']*100,2) ?></td>
                                    </tr>
                                    <?php $n++;
                                  }
                                  ?>
                                </tbody>
                              </table>
                            </div>
                            <hr>
                            <p class="mb-0" style="text-align: justify;">
                              <h6>Kesimpulan :</h6><br>
                              Berdasarkah hasil perhitungan yang telah ditentukan, dapat disimpulkan bahwa karyawan <b><?php echo $hasil1 ?></b> dengan Nomor Induk Karyawan (NIK) <b><?php echo $hasil2 ?></b> merupakan karyawan terbaik pada bulan <b><?php echo $bul[$bulan]." ".$tahun ?></b>, dengan nilai akhir <b><?php echo $hasil3 ?></b>
                            </p>
                          </div>
                        </div>
                      <?php } ?>
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