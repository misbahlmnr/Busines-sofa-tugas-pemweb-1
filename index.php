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
?>
<!DOCTYPE php>
<php lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="author" content="Untree.co" />
    <link rel="shortcut icon" href="favicon.png" />

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      rel="stylesheet"
    />
    <link href="css/tiny-slider.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
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
              <h1>
              Studio Desain <span clsas="d-block">Interior Modern</span>
              </h1>
              <p class="mb-4">
                Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet
                velit. Aliquam vulputate velit imperdiet dolor tempor tristique.
              </p>
              <p>
                <a href="product.php" class="btn btn-secondary me-2">Lihat Produk</a
              </p>
            </div>
          </div>
          <div class="col-lg-7">
            <div class="hero-img-wrap">
              <img src="images/couch.png" class="img-fluid" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Hero Section -->

    <!-- Start Product Section -->
    <div class="product-section">
      <div class="container">
        <div class="row">
          <!-- Start Column 1 -->
          <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
            <h2 class="mb-4 section-title">Dibuat dengan bahan yang sangat baik.</h2>
            <p class="mb-4">
              Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet
              velit. Aliquam vulputate velit imperdiet dolor tempor tristique.
            </p>
            <p><a href="product.php" class="btn">Jelajahi</a></p>
          </div>
          <!-- End Column 1 -->

          <!-- Start Column 2 -->
          <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
            <a class="product-item" href="#">
              <img
                src="images/product-1.png"
                class="img-fluid product-thumbnail"
              />
              <h3 class="product-title">Nordic Chair</h3>
              <strong class="product-price">Rp.2.500.000</strong>
            </a>
          </div>
          <!-- End Column 2 -->

          <!-- Start Column 3 -->
          <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
            <a class="product-item" href="#">
              <img
                src="images/product-2.png"
                class="img-fluid product-thumbnail"
              />
              <h3 class="product-title">Kruzo Aero Chair</h3>
              <strong class="product-price">Rp.1.174.000</strong>
            </a>
          </div>
          <!-- End Column 3 -->

          <!-- Start Column 4 -->
          <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
            <a class="product-item" href="#">
              <img
                src="images/product-3.png"
                class="img-fluid product-thumbnail"
              />
              <h3 class="product-title">Ergonomic Chair</h3>
              <strong class="product-price">Rp.647.000</strong>
            </a>
          </div>
          <!-- End Column 4 -->
        </div>
      </div>
    </div>
    <!-- End Product Section -->

    <!-- Start Why Choose Us Section -->
    <div class="why-choose-section">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-6">
            <h2 class="section-title">Mengapa Memilih Kami</h2>
            <p>
              Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet
              velit. Aliquam vulputate velit imperdiet dolor tempor tristique.
            </p>

            <div class="row my-5">
              <div class="col-6 col-md-6">
                <div class="feature">
                  <div class="icon">
                    <img src="images/truck.svg" alt="Image" class="imf-fluid" />
                  </div>
                  <h3>Cepat & Bebas biaya kirim</h3>
                  <p>
                    Donec vitae odio quis nisl dapibus malesuada. Nullam ac
                    aliquet velit. Aliquam vulputate.
                  </p>
                </div>
              </div>

              <div class="col-6 col-md-6">
                <div class="feature">
                  <div class="icon">
                    <img src="images/bag.svg" alt="Image" class="imf-fluid" />
                  </div>
                  <h3>Mudah untuk Berbelanja</h3>
                  <p>
                    Donec vitae odio quis nisl dapibus malesuada. Nullam ac
                    aliquet velit. Aliquam vulputate.
                  </p>
                </div>
              </div>

              <div class="col-6 col-md-6">
                <div class="feature">
                  <div class="icon">
                    <img
                      src="images/support.svg"
                      alt="Image"
                      class="imf-fluid"
                    />
                  </div>
                  <h3>Dukungan 24/7</h3>
                  <p>
                    Donec vitae odio quis nisl dapibus malesuada. Nullam ac
                    aliquet velit. Aliquam vulputate.
                  </p>
                </div>
              </div>

              <div class="col-6 col-md-6">
                <div class="feature">
                  <div class="icon">
                    <img
                      src="images/return.svg"
                      alt="Image"
                      class="imf-fluid"
                    />
                  </div>
                  <h3>Pengembalian Bebas Kerumitan</h3>
                  <p>
                    Donec vitae odio quis nisl dapibus malesuada. Nullam ac
                    aliquet velit. Aliquam vulputate.
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-5">
            <div class="img-wrap">
              <img
                src="images/why-choose-us-img.jpg"
                alt="Image"
                class="img-fluid"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Why Choose Us Section -->

    <!-- Start We Help Section -->
    <div class="we-help-section">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-7 mb-5 mb-lg-0">
            <div class="imgs-grid">
              <div class="grid grid-1">
                <img src="images/img-grid-1.jpg" alt="Untree.co" />
              </div>
              <div class="grid grid-2">
                <img src="images/img-grid-2.jpg" alt="Untree.co" />
              </div>
              <div class="grid grid-3">
                <img src="images/img-grid-3.jpg" alt="Untree.co" />
              </div>
            </div>
          </div>
          <div class="col-lg-5 ps-lg-5">
            <h2 class="section-title mb-4">
            Kami Membantu Anda Membuat Desain Interior Modern
            </h2>
            <p>
              Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio
              quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
              vulputate velit imperdiet dolor tempor tristique. Pellentesque
              habitant morbi tristique senectus et netus et malesuada
            </p>

            <ul class="list-unstyled custom-list my-4">
              <li>Donec vitae odio quis nisl dapibus malesuada</li>
              <li>Donec vitae odio quis nisl dapibus malesuada</li>
              <li>Donec vitae odio quis nisl dapibus malesuada</li>
              <li>Donec vitae odio quis nisl dapibus malesuada</li>
            </ul>
            <p><a herf="#" class="btn">Jelajahi</a></p>
          </div>
        </div>
      </div>
    </div>
    <!-- End We Help Section -->

    <!-- Start Popular Product -->
    <div class="popular-product">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="product-item-sm d-flex">
              <div class="thumbnail">
                <img src="images/product-1.png" alt="Image" class="img-fluid" />
              </div>
              <div class="pt-3">
                <h3>Nordic Chair</h3>
                <p>
                  Donec facilisis quam ut purus rutrum lobortis. Donec vitae
                  odio
                </p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="product-item-sm d-flex">
              <div class="thumbnail">
                <img src="images/product-2.png" alt="Image" class="img-fluid" />
              </div>
              <div class="pt-3">
                <h3>Kruzo Aero Chair</h3>
                <p>
                  Donec facilisis quam ut purus rutrum lobortis. Donec vitae
                  odio
                </p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="product-item-sm d-flex">
              <div class="thumbnail">
                <img src="images/product-3.png" alt="Image" class="img-fluid" />
              </div>
              <div class="pt-3">
                <h3>Ergonomic Chair</h3>
                <p>
                  Donec facilisis quam ut purus rutrum lobortis. Donec vitae
                  odio
                </p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Popular Product -->

    <!-- Start Testimonial Slider -->
    <div class="testimonial-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 mx-auto text-center">
            <h2 class="section-title">Testimoni</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="testimonial-slider-wrap text-center">
              <div id="testimonial-nav">
                <span class="prev" data-controls="prev"
                  ><span class="fa fa-chevron-left"></span
                ></span>
                <span class="next" data-controls="next"
                  ><span class="fa fa-chevron-right"></span
                ></span>
              </div>

              <div class="testimonial-slider">
                <div class="item">
                  <div class="row justify-content-center">
                    <div class="col-lg-8 mx-auto">
                      <div class="testimonial-block text-center">
                        <blockquote class="mb-5">
                          <p>
                            &ldquo;Donec facilisis quam ut purus rutrum
                            lobortis. Donec vitae odio quis nisl dapibus
                            malesuada. Nullam ac aliquet velit. Aliquam
                            vulputate velit imperdiet dolor tempor tristique.
                            Pellentesque habitant morbi tristique senectus et
                            netus et malesuada fames ac turpis egestas. Integer
                            convallis volutpat dui quis scelerisque.&rdquo;
                          </p>
                        </blockquote>

                        <div class="author-info">
                          <div class="author-pic">
                            <img
                              src="images/person-1.png"
                              alt="Maria Jones"
                              class="img-fluid"
                            />
                          </div>
                          <h3 class="font-weight-bold">Maria Jones</h3>
                          <span class="position d-block mb-3"
                            >CEO, Co-Founder, XYZ Inc.</span
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END item -->

                <div class="item">
                  <div class="row justify-content-center">
                    <div class="col-lg-8 mx-auto">
                      <div class="testimonial-block text-center">
                        <blockquote class="mb-5">
                          <p>
                            &ldquo;Donec facilisis quam ut purus rutrum
                            lobortis. Donec vitae odio quis nisl dapibus
                            malesuada. Nullam ac aliquet velit. Aliquam
                            vulputate velit imperdiet dolor tempor tristique.
                            Pellentesque habitant morbi tristique senectus et
                            netus et malesuada fames ac turpis egestas. Integer
                            convallis volutpat dui quis scelerisque.&rdquo;
                          </p>
                        </blockquote>

                        <div class="author-info">
                          <div class="author-pic">
                            <img
                              src="images/person-1.png"
                              alt="Maria Jones"
                              class="img-fluid"
                            />
                          </div>
                          <h3 class="font-weight-bold">Maria Jones</h3>
                          <span class="position d-block mb-3"
                            >CEO, Co-Founder, XYZ Inc.</span
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END item -->

                <div class="item">
                  <div class="row justify-content-center">
                    <div class="col-lg-8 mx-auto">
                      <div class="testimonial-block text-center">
                        <blockquote class="mb-5">
                          <p>
                            &ldquo;Donec facilisis quam ut purus rutrum
                            lobortis. Donec vitae odio quis nisl dapibus
                            malesuada. Nullam ac aliquet velit. Aliquam
                            vulputate velit imperdiet dolor tempor tristique.
                            Pellentesque habitant morbi tristique senectus et
                            netus et malesuada fames ac turpis egestas. Integer
                            convallis volutpat dui quis scelerisque.&rdquo;
                          </p>
                        </blockquote>

                        <div class="author-info">
                          <div class="author-pic">
                            <img
                              src="images/person-1.png"
                              alt="Maria Jones"
                              class="img-fluid"
                            />
                          </div>
                          <h3 class="font-weight-bold">Maria Jones</h3>
                          <span class="position d-block mb-3"
                            >CEO, Co-Founder, XYZ Inc.</span
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END item -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Testimonial Slider -->

    <!-- Start Blog Section -->
    <div class="blog-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6">
            <h2 class="section-title">Blog Terbaru</h2>
          </div>
          <div class="col-md-6 text-start text-md-end">
            <a href="#" class="more">Lihat Semua Postingan</a>
          </div>
        </div>

        <div class="row">
          <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
            <div class="post-entry">
              <a href="#" class="post-thumbnail"
                ><img src="images/post-1.jpg" alt="Image" class="img-fluid"
              /></a>
              <div class="post-content-entry">
                <h3><a href="#">Ide Pemilik Rumah Pertama Kali</a></h3>
                <div class="meta">
                  <span>by <a href="#">Kristin Watson</a></span>
                  <span>on <a href="#">Dec 19, 2021</a></span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
            <div class="post-entry">
              <a href="#" class="post-thumbnail"
                ><img src="images/post-2.jpg" alt="Image" class="img-fluid"
              /></a>
              <div class="post-content-entry">
                <h3><a href="#">Cara Menjaga Furnitur Anda Tetap Bersih</a></h3>
                <div class="meta">
                  <span>by <a href="#">Robert Fox</a></span>
                  <span>on <a href="#">Dec 15, 2021</a></span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
            <div class="post-entry">
              <a href="#" class="post-thumbnail"
                ><img src="images/post-3.jpg" alt="Image" class="img-fluid"
              /></a>
              <div class="post-content-entry">
                <h3><a href="#">Ide Apartemen Furnitur Ruang Kecil</a></h3>
                <div class="meta">
                  <span>by <a href="#">Kristin Watson</a></span>
                  <span>on <a href="#">Dec 12, 2021</a></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Blog Section -->

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
</php>
