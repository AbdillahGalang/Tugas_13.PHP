<?php include 'views/layouts/header.php'; ?>
<?php include 'views/layouts/sidebar.php'; ?>

<div class="card-custom bg-white p-4">
    <h3>Detail Restoran</h3>
    <hr>
    <div class="row">
        <div class="col-md-8">
            <table class="table table-borderless">
                <tr><th width="200">Nama</th><td>: <?= htmlspecialchars($item['nama']) ?></td></tr>
                <tr><th>Alamat</th><td>: <?= htmlspecialchars($item['alamat']) ?></td></tr>
                <tr><th>Telepon</th><td>: <?= htmlspecialchars($item['telepon']) ?></td></tr>
                <tr><th>Terdaftar Sejak</th><td>: <?= $item['created_at'] ?></td></tr>
            </table>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>

<?php include 'views/layouts/footer.php'; ?>