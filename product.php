<?php
session_start();
require_once 'config/Database.php';
require_once 'config/Crud.php';

$obj = new Crud();
$login = false;

if(isset($_SESSION['login'])) {
  $login = true;
  $id_user = $_SESSION['id'];
  $data_user = $obj->get('users', ["id = $id_user"]);
  $data_user = $data_user->fetch(PDO::FETCH_ASSOC);
}

// ambil data product
$data_product = $obj->get('product');
$data_product = $data_product->fetchAll();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="css/tiny-slider.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<title>MDev Sofa - UAS Pemograman Web</title>
	</head>

	<body>

		<!-- Start Header/Navigation -->
		<nav
      class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark"
      arial-label="Furni navigation bar"
    >
      <div class="container">
        <a class="navbar-brand" href="index.php">MDev Sofa<span>.</span></a>

        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarsFurni"
          aria-controls="navbarsFurni"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
          <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Beranda</a>
            </li>
            <li><a class="nav-link" href="product.php">Produk</a></li>
            <li><a class="nav-link" href="about.php">Tentang Kami</a></li>
            <li><a class="nav-link" href="services.php">Layanan</a></li>
						<li><a class="nav-link" href="blog.php">Blog</a></li>
            <li><a class="nav-link" href="contact.php">Kontak Kami</a></li>
						<?php if ($login) : ?>
              <li><a class="nav-link" href="admin/index.php"><?= $data_user['username'];?></a></li>
            <?php else : ?>
              <li><a class="nav-link" href="register.php">Daftar</a></li>
              <li><a class="nav-link" href="login.php">Masuk</a></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>
		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Produk</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		

		<div class="untree_co-section product-section before-footer-section">
		    <div class="container">
		      	<div class="row">

		      		<!-- Start Column 1 -->
							<?php foreach($data_product as $data) : ?>
								<div class="col-12 col-md-4 col-lg-3 mb-5">
									<a class="product-item" href="#">
										<img src="admin/uploads/product/<?= $data['image'];?>" class="img-fluid product-thumbnail">
										<h3 class="product-title"><?= $data['nama_product'];?></h3>
										<strong class="product-price">Rp. <?= $data['harga_product'];?></strong>
										<br>
										<?php if ($data['ketersediaan'] === "Tersedia") : ?>
											<span class="badge bg-info text-dark"><?= $data['ketersediaan'];?></span>
										<?php else : ?>
											<span class="badge bg-danger"><?= $data['ketersediaan'];?></span>
										<?php endif; ?>
									</a>
								</div> 
							<?php endforeach; ?>
							<!-- End Column 1 -->
		      	</div>
		    </div>
		</div>


		<!-- Start Footer Section -->
		<footer class="footer-section">
			<div class="container relative">

				<div class="sofa-img">
					<img src="images/sofa.png" alt="Image" class="img-fluid">
				</div>

				<div class="row">
					<div class="col-lg-8">
						<div class="subscription-form">
							<h3 class="d-flex align-items-center"><span class="me-1"><img src="images/envelope-outline.svg" alt="Image" class="img-fluid"></span><span>Follow untuk Newsletter</span></h3>

							<form action="#" class="row g-3">
								<div class="col-auto">
									<input type="text" class="form-control" placeholder="Masukan nama kamu">
								</div>
								<div class="col-auto">
									<input type="email" class="form-control" placeholder="Masukan email kamu">
								</div>
								<div class="col-auto">
									<button class="btn btn-primary">
										<span class="fa fa-paper-plane"></span>
									</button>
								</div>
							</form>

						</div>
					</div>
				</div>

				<div class="row g-5 mb-5">
					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">MDev Sofa<span>.</span></a></div>
						<p class="mb-4">Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant</p>

						<ul class="list-unstyled custom-social">
							<li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
						</ul>
					</div>

					<div class="col-lg-8">
						<div class="row links-wrap">
							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Tentang Kami</a></li>
									<li><a href="#">Layanan</a></li>
									<li><a href="#">Blog</a></li>
									<li><a href="#">Kontak Kami</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Support</a></li>
									<li><a href="#">Pengetahuan Dasar</a></li>
									<li><a href="#">Chat Langsung</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Pekerjaan</a></li>
									<li><a href="#">Privacy Policy</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Nordic Chair</a></li>
									<li><a href="#">Kruzo Aero</a></li>
									<li><a href="#">Ergonomic Chair</a></li>
								</ul>
							</div>
						</div>
					</div>

				</div>

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">@Copyright by 21552011178_MISBAH_TIFRM21_UASWEB1</p>
						</div>

						<div class="col-lg-6 text-center text-lg-end">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>

					</div>
				</div>

			</div>
		</footer>
		<!-- End Footer Section -->	


		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>

</html>
