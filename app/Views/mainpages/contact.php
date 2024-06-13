<section class="breadcrumbs">
  <div class="container">

    <ol>
      <li><a href=<?= base_url('Main/index') ?>>Home</a></li>
      <li>Contact</li>
    </ol>
    <h2>Contact Details</h2>

  </div>
</section>

<section id="contact" class="contact">

  <div class="container" data-aos="fade-up">

    <header class="section-header">
      <h2>Contact</h2>
      <p>Hubungi Kami</p>
    </header>

    <div class="row gy-4">

      <div class="col-lg-6">

        <div class="row gy-4">
          <div class="col-md-6">
            <div class="info-box">
              <i class="bi bi-geo-alt"></i>
              <h3>Alamat</h3>
              <p>Alaska Park, Jl. Sungai Abit, RT.27/RW.09, <br>Cempaka, Kec. Cemp., Kota Banjar Baru, Kalimantan Selatan 70731,</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box">
              <i class="bi bi-telephone"></i>
              <h3>Hubungi</h3>
              <p>+62 XXXX XXXXXX XX<br>+62 XXXX XXXXXX XX</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p>astiket@gmail.com<br>alaskapark@gmail.com</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box">
              <i class="bi bi-clock"></i>
              <h3>Jam Buka</h3>
              <p>Monday - Sunday<br>9:00AM - 05:00PM</p>
            </div>
          </div>
        </div>

      </div>

      <div class="col-lg-6">
        <?= form_open('Contact/submit', ['id' => 'formId']); ?>
        <div class="row gy-4">
          <div class="col-md-6">
            <input type="text" name="name" class="form-control" placeholder="Nama" required>
          </div>
          <div class="col-md-6">
            <input type="email" class="form-control" name="email" placeholder="Email" required>
          </div>
          <div class="col-md-12">
            <input type="text" class="form-control" name="subject" placeholder="Subject" required>
          </div>
          <div class="col-md-12">
            <textarea class="form-control" name="message" rows="6" placeholder="Pesan" required></textarea>
          </div>
          <div class="col-md-12 text-center">
            <button type="button" class="btn btn-primary" style="background-color: #012970; border-color: #012970;" onclick="submitForm()">Kirim Pesan</button>
          </div>
        </div>
        <?= form_close(); ?>


      </div>

    </div>

  </div>

</section><!-- End Contact Section -->

<div class="modal fade" id="validationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Validation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Silakan isi semua kolom dan masukkan alamat email yang valid.
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Success!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Pesan Anda telah dikirim. Terima kasih!
      </div>
    </div>
  </div>
</div>

<script>
  function submitForm() {
    var nameInput = document.getElementsByName('name')[0];
    var emailInput = document.getElementsByName('email')[0];
    var subjectInput = document.getElementsByName('subject')[0];
    var messageInput = document.getElementsByName('message')[0];

    // Check if any field is empty
    if (!nameInput.value.trim() || !emailInput.value.trim() || !subjectInput.value.trim() || !messageInput.value.trim()) {
      var validationModal = new bootstrap.Modal(document.getElementById('validationModal'));
      validationModal.show();
      return;
    }

    // Check if the email format is valid
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(emailInput.value)) {
      var validationModal = new bootstrap.Modal(document.getElementById('validationModal'));
      validationModal.show();
      return;
    }

    // If all validations pass, submit the form
    document.getElementById('formId').submit();
    var successModal = new bootstrap.Modal(document.getElementById('successModal'));
    successModal.show();
  }
</script>