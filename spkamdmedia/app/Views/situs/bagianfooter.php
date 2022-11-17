<?php
$db = db_connect();
$data = $db->query("select * from informasi")->getRow();
?>
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 footer-contact">
                    <h4>Kontak Kami</h4>
                    <p>
                        <?php echo $data->alamat ?><br><br>
                        <strong>Telepon:</strong> <?php echo $data->telepon ?><br>
                        <strong>Email:</strong> <?php echo $data->email ?><br>
                    </p>
                </div>
                <div class="col-lg-9 col-md-6 footer-info">
                    <h3>Tentang PBTR</h3>
                    <p style="text-align: justify;">
                        <b>PT Pemalang Batang Toll Road</b><br>
                        PT Pemalang Batang Toll Road didirikan dengan berdasar pada akta Notaris Bonardo Nasution, S.H., No. 10 tanggal 15 Juni 2006. Kemudian, dasar hukum pendirian diperbaharui dengan Akta No. 14 tanggal 22 Juni 2006 dengan Notaris yang sama. Akta Pendirian telah mendapat pengesahan secara resmi dari Menteri Hukum dan Hak Asasi Manusia Republik Indonesia melalui surat Keputusan No.C-20478.HT.01.01.TH.2006 tanggal 13 Juli 2006.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>PBTR</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="https://pbtr.co.id/v2/">PT Pemalang Batang Toll Road</a>
        </div>
    </div>
</footer>