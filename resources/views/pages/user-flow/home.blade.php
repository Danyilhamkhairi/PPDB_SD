@extends('pages.home.index')

@section('content')
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center justify-content-between">
        <div class="logo">
          <h1 class="text-light"><a href="{{ route('landing-page') }}"><span>SD Negeri 98</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="{{asset('assets/img/logo.png')}}" alt="" class="img-fluid"></a>-->
        </div>

        <nav class="nav-menu d-none d-lg-block">
          <ul>
            <li class="active"><a href="#header"><i class="icofont-home"></i> Beranda</a></li>
            <li><a href="#about"><i class="icofont-info-circle"></i> Tentang</a></li>
            <li><a href="#services"><i class="icofont-building"></i> Fasilitas</a></li>
            <li><a href="#contact"><i class="icofont-envelope"></i> Kontak</a></li>
            <li class="get-started"><a href="{{ route('daftar') }}"><i class="icofont-pencil-alt-2"></i> Daftar</a></li>
            <li class="login"><a href="{{ route('login') }}"><i class="icofont-user"></i> Login</a></li>
          </ul>
        </nav><!-- .nav-menu -->

        <div class="mobile-nav-toggle d-lg-none">
          <i class="icofont-navigation-menu"></i>
        </div>
      </div><!-- End Header Container -->
    </div>
  </header>
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
    <h1>Selamat Datang di SD Negeri 98/X Rantau Indah</h1>
    <h2>Pendidikan Berkualitas untuk Masa Depan Gemilang - Membentuk Generasi Unggul, Cerdas dan Berakhlak Mulia</h2>
    <div class="hero-buttons">
        <a href="{{ route('daftar') }}" class="btn-get-started scrollto"><i class="icofont-pencil-alt-2"></i> Daftar Sekarang</a>
        <a href="#about" class="btn-learn-more scrollto"><i class="icofont-info-circle"></i> Pelajari Lebih Lanjut</a>
    </div>
    </div>
</section><!-- End Hero -->

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
    <div class="container">

        <div class="row content">
        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <img src="{{asset('assets/img/kepala-sekolah.jpg')}}" alt="" class="img-fluid rounded shadow">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left" data-aos-delay="200">
            <p>
            SD Negeri 98/X Rantau Indah didirikan pada tahun 1990 untuk memenuhi kebutuhan pendidikan dasar di kawasan Rantau Indah. Dengan visi menjadi lembaga pendidikan yang unggul, kami berdedikasi untuk mendidik murid-murid sebagai generasi penerus bangsa yang cerdas, berakhlak mulia, dan mampu bersaing di era global.
            </p>

            <div class="row stats-container mb-4">
                <div class="col-md-6">
                    <div class="stats-box">
                        <i class="icofont-users-alt-5"></i>
                        <h4>107 Siswa</h4>
                        <p>49 Laki-laki & 58 Perempuan</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="stats-box">
                        <i class="icofont-teacher"></i>
                        <h4>8 Guru Profesional</h4>
                        <p>6 Rombongan Belajar</p>
                    </div>
                </div>
            </div>

            <p class="font-italic">
            Sekolah kami terus berkomitmen untuk memberikan pendidikan dasar berkualitas bagi masyarakat sekitar dengan menerapkan Kurikulum SD 2013. Kami mendorong setiap siswa untuk mengembangkan seluruh potensinya melalui berbagai kegiatan akademik dan ekstrakurikuler yang terpadu.
            </p>
        </div>
        </div>

    </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
    <div class="container">

        <div class="row">
        <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-right">
            <div class="content">
            <h3>Kenapa Memilih Sekolah Ini?</h3>
            <p>
                SD Negeri 98/X Rantau Indah menjadi lembaga pendidikan dasar pilihan yang memiliki pengakuan luar biasa dalam hal prestasi akademik, proses belajar mengajar yang interaktif serta suasana belajar yang menyenangkan, dan penerapan Kurikulum SD 2013 yang komprehensif untuk mempersiapkan siswa menghadapi tantangan masa depan.
            </p>
            <div class="why-us-features">
                <div class="feature-item">
                    <i class="icofont-medal"></i>
                    <span>Prestasi Akademik & Non-Akademik Unggul</span>
                </div>
                <div class="feature-item">
                    <i class="icofont-learn"></i>
                    <span>Metode Pembelajaran Kreatif & Inovatif</span>
                </div>
                <div class="feature-item">
                    <i class="icofont-university"></i>
                    <span>Fasilitas Lengkap & Lingkungan Kondusif</span>
                </div>
                <div class="feature-item">
                    <i class="icofont-user-suited"></i>
                    <span>Tenaga Pengajar Berkualitas & Berpengalaman</span>
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
            <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-chalkboard"></i>
                    <h4>Ruang Kelas</h4>
                    <p>Ruang kelas didesain agar anak merasa nyaman dan dapat berinteraksi dengan guru serta teman-temannya dengan leluasa. Perpustakaan, Ruang Kesehatan, Kantin Sekolah, Mushola, Lapangan Olahraga yang memadai.</p>
                </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-user-check"></i>
                    <h4>Lebih Menekankan Kepada Pendidikan Karakter</h4>
                    <p>Memungkinkan Siswa Lebih Aktif, Inovatif dan Kreatif, Lebih Responsif Terhadap Fenomena Sosial yang Ada, Proses Penilaian Dilakukan Dari Semua Aspek, Lembaga Memperoleh Pendampingan dari Pusat.</p>
                </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-book-open"></i>
                    <h4>Kurikulum SD 2013</h4>
                    <p>Menerapkan Kurikulum SD 2013 yang disesuaikan dengan kebutuhan siswa dan perkembangan pendidikan modern. Dengan 6 rombongan belajar dan 8 guru berpengalaman, kami mempersiapkan siswa menghadapi tantangan masa depan.</p>
                </div>
                </div>
            </div>
            </div><!-- End .content-->
        </div>
        </div>

    </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
    <div class="container">

        <div class="row">
        <div class="col-lg-4">
            <div class="section-title" data-aos="fade-right">
            <h2>Fasilitas</h2>
            <p>Fasilitas belajar merupakan sarana dan prasarana pembelajaran. Prasarana meliputi kantin, ruang belajar, lapangan olahraga, perpustakaan, dll.</p>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
            <div class="col-md-6 d-flex align-items-stretch">
                <div class="icon-box align-self-center" data-aos="zoom-in" data-aos-delay="100">
                <img src="{{asset('assets/img/kantin.jpg')}}" class="img-fluid rounded shadow" alt="">
                </div>
            </div>

            <div class="col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                <div class="icon-box align-self-center" data-aos="zoom-in" data-aos-delay="200">
                <img src="{{asset('assets/img/kelas.jpg')}}" class="img-fluid rounded shadow" alt="">
                </div>
            </div>

            <div class="col-md-6 d-flex align-items-stretch mt-4">
                <div class="icon-box align-self-center" data-aos="zoom-in" data-aos-delay="300">
                <img src="{{asset('assets/img/lab komputer.jpeg')}}" class="img-fluid rounded shadow" alt="">
                </div>
            </div>

            <div class="col-md-6 d-flex align-items-stretch mt-4">
                <div class="icon-box align-self-center" data-aos="zoom-in" data-aos-delay="400">
                <img src="{{asset('assets/img/lpangan.jpg')}}" class="img-fluid rounded shadow" alt="">
                </div>
            </div>

            </div>
        </div>
        </div>

    </div>
    </section><!-- End Services Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
    <div class="container">
        <div class="row">
        <div class="col-lg-4" data-aos="fade-right">
            <div class="section-title">
            <h2>Kontak</h2>
            <p>Untuk info lebih lanjut bisa menghubungi kontak yang tercantum.</p>
            </div>
        </div>

        <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
            <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3985.4376686022516!2d103.9503963!3d-1.1840476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e25df84efac6755%3A0xbc11db906903a3c0!2sSDN%2098%20Rantau%20Indah!5e0!3m2!1sid!2sid!4v1616331876465!5m2!1sid!2sid" frameborder="0" allowfullscreen></iframe>
            <div class="info mt-4">
            <i class="icofont-google-map"></i>
            <h4>Alamat:</h4>
            <p>Jl.KH.DEWANTARA NO.12 KEL.RANTAU INDAH,KAB. TANJUNG JABUNG TIMUR</p>
            </div>
            <div class="row">
            <div class="col-lg-6 mt-4">
                <div class="info">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>sdn98ri@gmail.com</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="info w-100 mt-4">
                <i class="icofont-phone"></i>
                <h4>Telepon:</h4>
                <p>+62 8123 4567 890</p>
                </div>
            </div>
            </div>
        </div>
        </div>

    </div>
    </section><!-- End Contact Section -->

</main>
<!-- End #main -->

@push('style')
<!-- CSS untuk modern styling -->
<style>
/* Navbar and menu styling */
.nav-menu ul {
  display: flex;
  align-items: center;
}

.nav-menu ul li a {
  display: flex;
  align-items: center;
  padding: 10px 15px;
  font-weight: 500;
  font-size: 15px;
  color: #585a61;
  white-space: nowrap;
  transition: 0.3s;
  border-radius: 50px;
}

.nav-menu ul li a i {
  font-size: 16px;
  margin-right: 5px;
  color: #5777ba;
}

.nav-menu ul li a:hover,
.nav-menu .active > a {
  color: #5777ba;
  background: rgba(87, 119, 186, 0.05);
}

/* Get Started Button */
.nav-menu .get-started a {
  background: #5777ba;
  color: #fff;
  border-radius: 50px;
  margin: 0 15px;
  padding: 8px 25px;
  transition: 0.3s;
}

.nav-menu .get-started a:hover {
  background: #748ec6;
  color: #fff;
}

.nav-menu .get-started a i {
  color: #fff;
}

/* Login Button */
.nav-menu .login a {
  padding: 8px 20px;
  margin-left: 10px;
  border: 2px solid #5777ba;
  color: #5777ba;
  border-radius: 50px;
  transition: 0.3s;
  display: flex;
  align-items: center;
}

.nav-menu .login a:hover {
  background: #5777ba;
  color: #fff;
}

.nav-menu .login a:hover i {
  color: #fff;
}

/* Mobile menu improvements */
.mobile-nav {
  position: fixed;
  top: 0;
  bottom: 0;
  right: -260px;
  width: 260px;
  padding: 20px 0;
  background: #fff;
  overflow-y: auto;
  transition: 0.4s;
  z-index: 9998;
  box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
}

.mobile-nav ul {
  padding: 0;
  margin: 0;
  list-style: none;
}

.mobile-nav a {
  display: flex;
  align-items: center;
  padding: 10px 20px;
  font-weight: 500;
  color: #585a61;
  transition: 0.3s;
}

.mobile-nav a i {
  font-size: 16px;
  color: #5777ba;
  margin-right: 10px;
}

.mobile-nav a:hover,
.mobile-nav .active > a {
  color: #5777ba;
  background: rgba(87, 119, 186, 0.05);
}

.mobile-nav .get-started a {
  background: #5777ba;
  color: #fff;
  border-radius: 50px;
  margin: 15px 20px;
  padding: 8px 25px;
  text-align: center;
  display: flex;
  justify-content: center;
}

.mobile-nav .get-started a:hover {
  background: #748ec6;
}

.mobile-nav .get-started a i {
  color: #fff;
}

.mobile-nav .login a {
  border: 2px solid #5777ba;
  color: #5777ba;
  border-radius: 50px;
  margin: 15px 20px;
  padding: 8px 25px;
  text-align: center;
  display: flex;
  justify-content: center;
}

.mobile-nav .login a:hover {
  background: #5777ba;
  color: #fff;
}

.mobile-nav .login a:hover i {
  color: #fff;
}

.mobile-nav-active .mobile-nav {
  right: 0;
}

.mobile-nav-toggle {
  position: fixed;
  right: 15px;
  top: 18px;
  z-index: 9999;
  border: 0;
  background: none;
  font-size: 24px;
  transition: all 0.4s;
  outline: none !important;
  line-height: 1;
  cursor: pointer;
  text-align: right;
}

.mobile-nav-toggle i {
  color: #5777ba;
}

/* Hero section improvements */
#hero {
  background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(255, 255, 255, 0.8) 100%), url("../img/hero-bg.jpg") center center no-repeat;
  background-size: cover;
  padding: 100px 0;
  position: relative;
}

#hero:before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(135deg, rgba(78, 103, 209, 0.1) 0%, rgba(255, 107, 107, 0.1) 100%);
}

#hero h1 {
  color: #333;
  margin-bottom: 10px;
  font-size: 42px;
  font-weight: 700;
  text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
}

#hero h2 {
  color: #555;
  margin-bottom: 30px;
  font-size: 20px;
  font-weight: 500;
  text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.05);
}

.btn-get-started {
  font-family: "Raleway", sans-serif;
  font-weight: 500;
  font-size: 16px;
  letter-spacing: 1px;
  display: inline-flex;
  align-items: center;
  padding: 12px 30px;
  border-radius: 50px;
  transition: 0.5s;
  color: #fff;
  background: #4e67d1;
  box-shadow: 0 5px 15px rgba(78, 103, 209, 0.4);
}

.btn-get-started:hover {
  background: #3a53c0;
  box-shadow: 0 8px 20px rgba(78, 103, 209, 0.6);
  transform: translateY(-3px);
}

.btn-get-started i {
  margin-right: 5px;
  font-size: 18px;
}

.hero-buttons {
  margin-top: 30px;
}

.btn-learn-more {
  font-family: "Raleway", sans-serif;
  font-weight: 500;
  font-size: 16px;
  letter-spacing: 1px;
  display: inline-flex;
  align-items: center;
  padding: 12px 30px;
  border-radius: 50px;
  transition: 0.5s;
  margin-left: 15px;
  color: #ff6b6b;
  background: #fff;
  border: 2px solid #ff6b6b;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.btn-learn-more:hover {
  background: rgba(255, 107, 107, 0.1);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
  transform: translateY(-3px);
}

.btn-learn-more i {
  margin-right: 5px;
  font-size: 18px;
  color: #ff6b6b;
}

/* Add shadow and rounded corners to images */
.img-fluid {
  border-radius: 10px;
  transition: all 0.3s ease;
}

.icon-box:hover .img-fluid {
  transform: scale(1.03);
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
}

/* Why us features */
.why-us-features {
  margin-top: 20px;
}

.feature-item {
  display: flex;
  align-items: center;
  margin-bottom: 15px;
  padding: 10px 15px;
  background-color: rgba(78, 103, 209, 0.08);
  border-radius: 50px;
  transition: all 0.3s ease;
}

.feature-item:hover {
  background-color: rgba(78, 103, 209, 0.15);
  transform: translateX(5px);
}

.feature-item:nth-child(odd) {
  background-color: rgba(255, 107, 107, 0.08);
}

.feature-item:nth-child(odd):hover {
  background-color: rgba(255, 107, 107, 0.15);
}

.feature-item i {
  font-size: 20px;
  color: #4e67d1;
  margin-right: 10px;
  transition: all 0.3s ease;
}

.feature-item:nth-child(odd) i {
  color: #ff6b6b;
}

.feature-item:hover i {
  transform: rotate(10deg);
}

.feature-item span {
  font-weight: 500;
  color: #212529;
}

/* Modernize icon boxes */
.icon-box {
  padding: 20px;
  border-radius: 10px;
  background: #fff;
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
  transition: all 0.3s ease;
}

.icon-box:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.icon-box i.bx {
  font-size: 32px;
  color: #4e67d1;
  margin-bottom: 20px;
  display: inline-block;
  padding: 15px;
  background: rgba(78, 103, 209, 0.1);
  border-radius: 50%;
  transition: all 0.3s ease;
}

.icon-box:hover i.bx {
  background: #4e67d1;
  color: #fff;
  transform: rotate(10deg);
}

/* Color alternating icon boxes */
.icon-boxes .col-xl-4:nth-child(odd) .icon-box i.bx {
  color: #ff6b6b;
  background: rgba(255, 107, 107, 0.1);
}

.icon-boxes .col-xl-4:nth-child(odd) .icon-box:hover i.bx {
  background: #ff6b6b;
  color: #fff;
}

/* Info box styling in contact section */
.info {
  padding: 20px;
  background: #fff;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  border-radius: 10px;
  margin-bottom: 20px;
}

.info i {
  font-size: 24px;
  color: #4e67d1;
  float: left;
  width: 48px;
  height: 48px;
  background: rgba(78, 103, 209, 0.1);
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50%;
  transition: all 0.3s ease;
}

.info:hover i {
  background: #4e67d1;
  color: #fff;
  transform: scale(1.1);
}

/* Alternate info colors */
.row .col-lg-6:nth-child(odd) .info i {
  color: #ff6b6b;
  background: rgba(255, 107, 107, 0.1);
}

.row .col-lg-6:nth-child(odd) .info:hover i {
  background: #ff6b6b;
  color: #fff;
}

.info h4 {
  padding: 0 0 0 60px;
  font-size: 18px;
  font-weight: 600;
  margin-bottom: 5px;
  color: #212529;
}

.info p {
  padding: 0 0 0 60px;
  margin-bottom: 0;
  font-size: 14px;
  color: #585a61;
}

/* Make map rounded */
iframe {
  border-radius: 10px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

/* Section styling */
.section-bg {
  background-color: #f9f9fa;
}

section {
  padding: 60px 0;
  overflow: hidden;
}

.section-title {
  text-align: left;
  padding-bottom: 30px;
}

.section-title h2 {
  font-size: 32px;
  font-weight: bold;
  text-transform: uppercase;
  margin-bottom: 20px;
  padding-bottom: 20px;
  position: relative;
  color: #212529;
}

.section-title h2::after {
  content: '';
  position: absolute;
  display: block;
  width: 50px;
  height: 3px;
  background: #4e67d1;
  bottom: 0;
  left: 0;
}

.section-title h2::before {
  content: '';
  position: absolute;
  display: block;
  width: 25px;
  height: 3px;
  background: #ff6b6b;
  bottom: 0;
  left: 55px;
}

/* Stats box styling */
.stats-container {
  margin: 25px 0;
}

.stats-box {
  background: #fff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
  text-align: center;
  transition: all 0.3s ease;
  height: 100%;
  border-left: 4px solid #4e67d1;
  background: linear-gradient(135deg, #ffffff 0%, #f8f9ff 100%);
}

.stats-box:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  border-left: 4px solid #ff6b6b;
}

.stats-box i {
  font-size: 42px;
  color: #4e67d1;
  margin-bottom: 15px;
  display: inline-block;
  transition: all 0.3s ease;
}

.stats-box:hover i {
  color: #ff6b6b;
  transform: scale(1.1);
}

.stats-box h4 {
  font-size: 22px;
  font-weight: 700;
  margin-bottom: 5px;
  color: #212529;
}

.stats-box p {
  font-size: 14px;
  margin-bottom: 0;
  color: #585a61;
}

/* Responsive styling */
@media (max-width: 992px) {
  .mobile-nav .mobile-only {
    display: block;
    margin: 15px auto;
    width: fit-content;
  }

  .stats-box {
    margin-bottom: 20px;
  }
}
</style>
@endpush

@push('script')
<!-- Script untuk mobile navigation -->
<script>
$(document).ready(function() {
  // Mobile navigation setup
  if ($('.nav-menu').length) {
    var $mobile_nav = $('.nav-menu').clone().prop({
      class: 'mobile-nav d-lg-none'
    });

    $('body').append($mobile_nav);

    // Toggle mobile navigation
    $(document).on('click', '.mobile-nav-toggle', function(e) {
      $('body').toggleClass('mobile-nav-active');
      $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
    });

    // Close mobile nav when clicking outside
    $(document).click(function(e) {
      var container = $(".mobile-nav, .mobile-nav-toggle");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
        }
      }
    });
  }

  // Smooth scroll for the navigation menu and links with .scrollto classes
  var scrolltoOffset = $('#header').outerHeight() - 2;
  $(document).on('click', '.nav-menu a, .mobile-nav a, .scrollto', function(e) {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      if (target.length) {
        e.preventDefault();

        var scrollto = target.offset().top - scrolltoOffset;

        if ($(this).attr("href") == '#header') {
          scrollto = 0;
        }

        $('html, body').animate({
          scrollTop: scrollto
        }, 1500, 'easeInOutExpo');

        if ($(this).parents('.nav-menu, .mobile-nav').length) {
          $('.nav-menu .active, .mobile-nav .active').removeClass('active');
          $(this).closest('li').addClass('active');
        }

        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
        }
        return false;
      }
    }
  });

  // Animation on scroll
  $(window).on('load', function() {
    AOS.init({
      duration: 1000,
      easing: "ease-in-out",
      once: true,
      mirror: false
    });
  });
});
</script>
@endpush
@endsection
