<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
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
                    <a href="<?= site_url('Report/generatePDF') ?>" class="btn btn-primary mb-2">PDF <i class="ti ti-file-type-pdf"></i></a>

                </div>
                <table id="myTable" class="table table-striped pt-3" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID PAYMENT</th>
                            <th>TANGGAL</th>
                            <th>USERNAME</th>
                            <th>TEMPAT</th>
                            <th>METODE</th>
                            <th>TOTAL</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($getData as $row) : ?>
                            <tr>
                                <td><?= $row->id_transaksi ?></td>
                                <td><?= $row->tanggal ?></td>
                                <td><?= $row->customer ?></td>
                                <td><?= $row->name_place ?></td>
                                <td><?= $row->metode ?></td>
                                <td>Rp. <?= $row->jumlah ?></td>
                                <td>
                                    <a href="<?= site_url('Transaksi/delete/' . $row->id_transaksi) ?>" class="btn btn-outline-danger" id="delete"><i class="ti ti-trash"></i></a>
                                    <a href="<?= site_url('Transaksi/generateTicketPDF/' . $row->id_transaksi) ?>" class="btn btn-outline-primary"><i class="ti ti-file-type-pdf"></i>Tiket</a>
                                </td>
                            </tr>
                        <?php $i++;
                        endforeach; ?>
                    </tbody>

                </table>

            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();

        });
        
    </script>

</body>


</html>