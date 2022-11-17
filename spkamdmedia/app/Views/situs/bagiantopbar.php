<?php
$uri = current_url(true);
$db = db_connect();
$data = $db->query('select * from informasi')->getRow();
?>
<section id="topbar" class="d-none d-lg-block">
    <div class="container d-flex">
        <div class="contact-info mr-auto">
            <i class="icofont-envelope"></i><a href="mailto:contact@example.com"><?php echo $data->email ?></a>
            <i class="icofont-phone"></i> <?php echo $data->telepon ?>
        </div>
    </div>
</section>
<header id="header">
    <div class="container d-flex">
        <div class="logo mr-auto">
            <h1 class="text-light"><a href="<?php echo base_url('') ?>"><span>PBTR</span></a></h1>
        </div>
        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li <?php if($uri->getSegment(2) == ''){ ?> class="active" <?php } ?>><a href="<?php echo base_url('') ?>">Beranda</a></li>
                <li <?php if($uri->getSegment(2) == 'tentang'){ ?> class="active" <?php } ?>><a href="<?php echo base_url('tentang') ?>">Tentang</a></li>
                <li <?php if($uri->getSegment(2) == 'jalur'){ ?> class="active" <?php } ?>><a href="<?php echo base_url('jalur') ?>">Cek Jalur</a></li>
                <li <?php if($uri->getSegment(2) == 'kontak'){ ?> class="active" <?php } ?>><a href="<?php echo base_url('kontak') ?>">Kontak</a></li>
                <li <?php if($uri->getSegment(2) == 'login'){ ?> class="active" <?php } ?>><a href="<?php echo base_url('login') ?>">Log In</a></li>
            </ul>
        </nav>
    </div>
</header>