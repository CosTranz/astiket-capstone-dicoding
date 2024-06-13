<section id="hero" class="hero d-flex align-items-center">
  <div class="container">
    <div class="row">
      <!-- Text Column -->
      <div class="col-lg-6 d-flex flex-column justify-content-center">
        <h1 data-aos="fade-up">Alaska Park</h1>
        <h2 data-aos="fade-up" data-aos-delay="400">Tempat yang indah serta beberapa wahana yang bisa pengunjung mainkan</h2>
        <div data-aos="fade-up" data-aos-delay="600">
        </div>
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


<!-- ***** Other End ***** -->

<section id="values" class="values">

  <div class="container" data-aos="fade-up">

    <header class="section-header">
      <h2>TIKET</h2>
      <p>Beli Tiket Wahana Mu!</p>
    </header>

    <div class="row">
      <?php foreach ($getData as $row) : ?>
        <?php if ($row->status === 'Active') : ?>
          <div class="col-lg-3 col-sm-6">
            <a href="<?= base_url('Transaksi/tiketadd/' . $row->id_place) ?>" class="item-link">
              <div class="row mb-4">
                <div class="item-body">
                  <img src="<?= base_url('/assets/uploads/img/' . $row->file) ?>" alt="Place Image" width="250" height="250">
                  <h3 class="item-title pt-3"><?= $row->name_place ?></h3>
                  <p><?= $row->status ?></p>
                </div>
              </div>
            </a>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>



  </div>


</section><!-- End Values Section -->