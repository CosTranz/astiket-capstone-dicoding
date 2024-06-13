<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>



    <div class="d-flex align-items-end row">
        <div class="col-sm-12">
            <div class="card-body">
                <?php if (session()->has('success')) : ?>
                    <div class="alert alert-success">
                        <?= session('success') ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->has('error')) : ?>
                    <div class="alert alert-danger">
                        <?= session('error') ?>
                    </div>
                <?php endif; ?>
                <div class="d-flex justify-content-between align-items-center mb-3 border-bottom">

                    <h4><?php echo $title ?></h4>
                    <a class="btn btn-primary mb-2" id="add">Add <i class="ti ti-table-plus"></i></a>


                </div>
                <table id="myTable" class="table table-striped pt-3" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID TEMPAT</th>
                            <th>POSTER</th>
                            <th>NAMA</th>
                            <th>JENIS</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($getData as $row) { ?>
                            <tr>
                                <td><?= $row->id_place ?></td>
                                <td>
                                    <?php if ($row->file) : ?>
                                        <img src="<?= base_url('assets/uploads/img/' . $row->file); ?>" alt="Place Image" style="max-width: 100px; max-height: 100px;">
                                    <?php endif; ?>
                                </td>
                                <td><?= $row->name_place ?></td>
                                <td><?= $row->jenis ?></td>
                                <td>
                                    <?php if ($row->status == 'Active') : ?>
                                        <span class="badge bg-success rounded-3 fw-semibold"><?= $row->status ?></span>
                                    <?php else : ?>
                                        <span class="badge bg-danger rounded-3 fw-semibold"><?= $row->status ?></span>
                                    <?php endif; ?>
                                </td>
                                


                                <td>
                                    <a href="<?= site_url('Place/edit/' . $row->id_place) ?>" class="btn btn-outline-primary" id="edit"><i class="ti ti-edit"></i></i></a>
                                    <a href="<?= site_url('Place/delete/' . $row->id_place) ?>" class="btn btn-outline-danger" id="delete"><i class="ti ti-trash"></i></a>
                                </td>
                            </tr>
                        <?php $i++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-md-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?php echo form_open_multipart('Place/submit', 'id="modalForm"', ['onsubmit' => 'return validateFile();']); ?>


                <div class="modal-body">
                    <div class="mb-3">
                        <label for="id_place" class="form-label">ID TEMPAT</label>
                        <input type="text" class="form-control" id="id_place" name="id_place" value="<?= old('id_place') ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="file">Tempat Image:</label>
                        <input type="file" name="file" id="file" />
                    </div>

                    <div class="mb-3">
                        <label for="name_place" class="form-label">Nama Tempat</label>
                        <input type="text" class="form-control" id="name_place" name="name_place" value="<?= old('name_place') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis</label>
                        <input type="text" class="form-control" id="jenis" name="jenis" value="<?= old('jenis') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" value="SIMPAN">Simpan</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>






        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();

            });

            $(function() {
                $('#add').on('click', function(e) {
                    e.preventDefault();
                    $('[name="id"]').val('');
                    $('#id_place').val('');
                    $('#name_place').val('');
                    $('#jenis').val('');
                    $('#status').val('');
                    $('#modalForm').modal('show');
                    $('.modal-title').text('Tambah Data');

                    $('#modalForm form').attr('action', '<?php echo site_url('Place/submit') ?>');
                })

                $(document).on('click', '#edit', function(e) {
                    e.preventDefault();
                    $link = $(this).attr('href');
                    $.ajax({
                        url: $link,
                        type: 'GET',
                        dataType: 'JSON',
                        success: function(data) {
                            // Menambahkan URL gambar ke elemen HTML
                            if (data.file_gambar) {
                                $('#previewImage').attr('src', '<?= base_url('public/assets/uploads/img/') ?>' + data.file_gambar);
                            } else {
                                // Jika gambar tidak ada, mungkin Anda ingin menampilkan gambar placeholder atau memberikan notifikasi
                                $('#previewImage').attr('src', '<?= base_url('public/assets/uploads/img/placeholder.jpg') ?>');
                            }
                            $.each(data, function(idx, val) {
                                $('[name="' + idx + '"]').val(val);
                            });
                            $('#modalForm').modal('show');
                            $('.modal-title').text('Ubah Data');
                            $('#modalForm form').attr('action', '<?php echo site_url('Place/update') ?>');
                        }
                    });
                });

            })

            function validateFile() {
                // Get the file input element
                var fileInput = document.getElementById('file');

                // Check if a file is selected
                if (fileInput.files.length > 0) {
                    // Get the selected file
                    var file = fileInput.files[0];

                    // Get the file extension
                    var fileExtension = file.name.split('.').pop().toLowerCase();

                    // Define the allowed file extensions
                    var allowedExtensions = ['png', 'jpg', 'jpeg'];

                    // Check if the file extension is in the allowed list
                    if (!allowedExtensions.includes(fileExtension)) {
                        // Invalid file type
                        alert('Invalid file type. Only PNG, JPG, and JPEG are allowed.');
                        // Clear the file input (optional)
                        fileInput.value = '';
                        return false; // Prevent form submission
                    }
                }

                return true; // Proceed with form submission
            }
        </script>

</body>


</html>