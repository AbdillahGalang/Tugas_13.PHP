<?php include 'views/layouts/header.php'; ?>
<?php include 'views/layouts/sidebar.php'; ?>

<div class="card-custom bg-white p-4">
    <h3><?= isset($item) ? 'Edit' : 'Tambah' ?> Data Restoran</h3>
    <form method="POST" class="mt-4">
        <div class="mb-3">
            <label class="form-label">Nama Restoran</label>
            <input type="text" name="nama" class="form-control" value="<?= $item['nama'] ?? '' ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" required><?= $item['alamat'] ?? '' ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Telepon</label>
            <input type="text" name="telepon" class="form-control" value="<?= $item['telepon'] ?? '' ?>">
        </div>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
        <a href="index.php" class="btn btn-light">Batal</a>
    </form>
</div>

<?php include 'views/layouts/footer.php'; ?>