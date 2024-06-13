<section class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="<?= base_url('Main/index') ?>">Home</a></li>
            <li>TIKET</li>
        </ol>
        <h2>Tiket Details</h2>

    </div>
</section><!-- End Breadcrumbs -->

<section id="portfolio-details" class="portfolio-details d-flex">
    <div class="container">

        <div class="row gy-4">

            <div class="col-lg-3">
                <div>
                    <?php if (!empty($placeDetail)) : ?>
                        <h3><?= $placeDetail->name_place ?></h3>
                        <p>Jenis : <?= $placeDetail->jenis ?></p>
                    <?php endif; ?>
                </div>
                <div class="portfolio-details">
                    <div class="align-items-center">
                        <?php if (!empty($placeDetail->file)) : ?>
                            <img src="<?= base_url('/assets/uploads/img/' . $placeDetail->file) ?>" alt="Tempat Image" width="250" height="250">
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="portfolio-info">
                    <h2>Add Transaction</h2>
                    <ul>
                        <?= form_open('Transaksi/submit', ['id' => 'formId']); ?>
                        <div class="form-group">
                            <label for="customer" class="col-sm-2 control-label pt-2">User</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="customer" name="customer" value="<?= esc(session()->get('customer')) ?>" readonly required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id_place" class="col-sm-2 control-label pt-2">Nama Tempat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name_place" name="name_place" value="<?= esc($placeDetail->name_place) ?>" readonly>
                                <input type="hidden" id="id_place" name="id_place" value="<?= esc($placeDetail->id_place) ?>">
                            </div>
                        </div>

                        <input type="hidden" id="id_transaksi" name="id_transaksi">

                        <div class="form-group">
                            <label for="quantity" class="col-sm-2 control-label pt-2">Quantity</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="quantity" name="quantity" aria-label="Quantity" onchange="updateTotalPrice()">
                                    <option value="40000">1 <?= $placeDetail->jenis ?> - Rp 40.000</option>
                                    <option value="70000">2 <?= $placeDetail->jenis ?> - Rp 70.000</option>
                                    <option value="120000">3 <?= $placeDetail->jenis ?> - Rp 120.000</option>
                                    <option value="160000">4 <?= $placeDetail->jenis ?> - Rp 160.000</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-10 pt-3">
                                <p>Price: <span id="totalLabel"></span></p>
                                <input type="hidden" id="totalInput" name="jumlah">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="metode" class="col-sm-2 control-label pt-2">Payment</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="button" class="btn btn-outline-secondary metode-btn" data-bs-toggle="button" aria-pressed="false" autocomplete="off" onclick="selectMetode('PayPal', this)">
                                            <img src="<?= base_url() ?>assets-game/img/paypal.png" alt="PayPal" class="metode-icon" style="width: 50px; height: 50px;">
                                        </button>
                                        <button type="button" class="btn btn-outline-secondary metode-btn" data-bs-toggle="button" aria-pressed="false" autocomplete="off" onclick="selectMetode('Dana', this)">
                                            <img src="<?= base_url() ?>assets-game/img/dana4.png" alt="Dana" class="metode-icon" style="width: 50px; height: 50px;">
                                        </button>
                                        <button type="button" class="btn btn-outline-secondary metode-btn" data-bs-toggle="button" aria-pressed="false" autocomplete="off" onclick="selectMetode('OVO', this)">
                                            <img src="<?= base_url() ?>assets-game/img/ovo.png" alt="OVO" class="metode-icon" style="width: 50px; height: 50px;">
                                        </button>
                                        <button type="button" class="btn btn-outline-secondary metode-btn" data-bs-toggle="button" aria-pressed="false" autocomplete="off" onclick="selectMetode('Gopay', this)">
                                            <img src="<?= base_url() ?>assets-game/img/gopay.jpg" alt="Gopay" class="metode-icon" style="width: 50px; height: 50px;">
                                        </button>
                                        <button type="button" class="btn btn-outline-secondary metode-btn" data-bs-toggle="button" aria-pressed="false" autocomplete="off" onclick="selectMetode('ShopeePay', this)">
                                            <img src="<?= base_url() ?>assets-game/img/sopepay.jpg" alt="ShopeePay" class="metode-icon" style="width: 50px; height: 50px;">
                                        </button>
                                        <button type="button" class="btn btn-outline-secondary metode-btn" data-bs-toggle="button" aria-pressed="false" autocomplete="off" onclick="selectMetode('BCA Mobile', this)">
                                            <img src="<?= base_url() ?>assets-game/img/bcam.png" alt="BCA Mobile" class="metode-icon" style="width: 50px; height: 50px;">
                                        </button>
                                    </div>
                                </div>
                                <input type="hidden" id="selectedMetode" name="metode" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10 pt-3">
                                <button type="button" class="btn btn-primary" style="background-color: #012970; border-color: #012970;" onclick="submitForm()">
                                    PAYMENT
                                </button>
                            </div>
                        </div>

                        <?= form_close(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Portfolio Details Section -->

<!-- Validasi Modal -->
<div class="modal fade" id="validationModal" tabindex="-1" aria-labelledby="validationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="validationModalLabel">PERINGATAN!!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               Harap isi semua kolom yang wajib diisi dan pilih metode pembayaran sebelum melanjutkan.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Thank You Modal -->
<div class="modal fade" id="thankYouModal" tabindex="-1" aria-labelledby="thankYouModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="thankYouModalLabel">Thank You!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Pembelian Anda berhasil. Terima kasih telah memilih layanan kami.
            </div>
        </div>
    </div>
</div>

<script>
    function updateTotalPrice() {
        var quantitySelect = document.getElementById('quantity');
        var totalLabel = document.getElementById('totalLabel');
        var totalInput = document.getElementById('totalInput');

        var selectedQuantity = parseInt(quantitySelect.value);

        totalLabel.textContent = `Rp ${selectedQuantity}`;
        totalInput.value = selectedQuantity;
    }

    function selectMetode(metode, button) {
        document.getElementById('selectedMetode').value = metode;

        var buttons = document.querySelectorAll('.metode-btn');
        buttons.forEach(function(btn) {
            btn.classList.remove('active');
            btn.setAttribute('aria-pressed', 'false');
        });
        button.classList.add('active');
        button.setAttribute('aria-pressed', 'true');
    }

    function submitForm() {
        var selectedQuantity = document.getElementById('totalInput').value;
        var selectedMetode = document.getElementById('selectedMetode').value;

        if (selectedQuantity && selectedMetode) {
            document.getElementById('formId').submit();
            var thankYouModal = new bootstrap.Modal(document.getElementById('thankYouModal'));
            thankYouModal.show();
        } else {
            var validationModal = new bootstrap.Modal(document.getElementById('validationModal'));
            validationModal.show();
        }
    }

    updateTotalPrice();
</script>
