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
            <h1>Halaman Awal</h1>
          </div>
          <div class="section-body">
          </div>
        </section>
      </div>
      <?php echo view('bagianfooter') ?>
    </div>
  </div>
  <?php echo view('bagianscript') ?>
</body>
</html>