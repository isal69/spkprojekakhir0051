<?php
//use CodeIgniter\Config\Services;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo view('situs/bagianhead'); ?>
</head>
<body>
	<?php echo view('situs/bagiantopbar'); ?>
	<main id="main">
		<section id="breadcrumbs" class="breadcrumbs">
			<div class="container">
				<ol>
					<li><a href="<?php echo base_url('public') ?>">Beranda</a></li>
					<li>Log In</li>
				</ol>
				<h2>Akses Log In</h2>
			</div>
		</section>
		<section id="contact" class="contact">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<form action="<?php echo base_url('getlogin') ?>" method="post" role="form">
							<div class="form-row">
								<div class="col form-group">
									<input type="text" name="username" class="form-control" placeholder="Masukkan Username Anda" required/>
								</div>
								<div class="col form-group">
									<input type="password" name="password" class="form-control" placeholder="Masukkan Password Anda" required/>
								</div>
							</div>
							<hr>
							<?php
							if(session()->getFlashData('gagal')){
								echo session()->getFlashData('gagal');
							}
							?>
							<div class="text-center"><button type="submit" class="btn btn-primary" style="color: white;">Send Message</button></div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</main>
	<?php echo view('situs/bagianfooter') ?>
	<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
	<?php echo view('situs/bagianscript') ?>
</body>
</html>