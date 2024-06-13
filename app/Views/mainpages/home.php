<style>
  #map {
    height: 400px;
    width: 100%;
  }
</style>
<!-- Hero Section -->
<section id="hero" class="hero d-flex align-items-center">
  <div class="container">
    <div class="row">
      <!-- Text Column -->
      <div class="col-lg-6 d-flex flex-column justify-content-center">
        <h1 data-aos="fade-up">Alaska Park</h1>
        <h2 data-aos="fade-up" data-aos-delay="400">Tempat yang indah serta beberapa wahana yang bisa pengunjung mainkan</h2>
        <div data-aos="fade-up" data-aos-delay="600"></div>
      </div>

      <!-- Carousel Column -->
      <div class="col-lg-6">
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner" data-aos="fade-up" data-aos-delay="400">
            <div class="carousel-item active">
              <img src="<?= base_url() ?>assets-game/img/istana-alaska.jpg" class="d-block w-100" alt="Slide 1">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Hero -->

<!-- Values Section -->
<section id="values" class="values">
  <div class="container" data-aos="fade-up">
    <header class="section-header">
      <p>Wahana Terfavorit</p>
    </header>
    <div class="row">
      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
        <div class="box">
          <img src="<?= base_url() ?>assets-game/img/bombom car.jpg" class="img-fluid" alt="bombomcar" width="100%" height="auto">
          <h3>Bom Bom Car</h3>
          <p>Bom Bom Car adalah wahana seru di mana pengunjung bisa mengendarai mobil-mobil bumper dan menikmati kesenangan menabrakkan mobil dengan aman.</p>
        </div>
      </div>
      <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
        <div class="box">
          <img src="<?= base_url() ?>assets-game/img/istana-alaska.jpg" class="img-fluid" alt="istana alaska" width="100%" height="auto">
          <h3>Kasitl Alaska</h3>
          <p>Kasitl Alaska adalah wahana hiburan yang menawarkan pengalaman bermain yang seru dan menegangkan.</p>
        </div>
      </div>
      <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
        <div class="box">
          <img src="<?= base_url() ?>assets-game/img/dinopark1.jpg" class="img-fluid" alt="dinopark" width="100%" height="auto">
          <h3>Dino Park</h3>
          <p>Wahana ini berupa hutan yang di dalamnya terdapat banyak patung dinosaurus. Uniknya patung-patung tersebut bisa bergerak layaknya hewan purba hidup.</p>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Values Section -->

<!-- OpenStreetMap Section -->
<section id="location" class="location">
  <div class="container" data-aos="fade-up">
    <header class="section-header">
      <p>Lokasi Alaska Park</p>
    </header>
    <div id="map"></div>
  </div>
</section><!-- End Location Section -->

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
  var map = L.map('map').setView([-3.5012, 114.8455], 13); // Koordinat untuk Banjarbaru, Kalimantan Selatan

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

  L.marker([-3.5012, 114.8455]).addTo(map)
    .bindPopup('Alaska Park, Jl. Sungai Abit, RT.27/RW.09, Cempaka, Kec. Cemp., Kota Banjar Baru, Kalimantan Selatan 70731')
    .openPopup();
</script>