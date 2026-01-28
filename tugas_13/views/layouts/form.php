<?php 
// Menggunakan __DIR__ . '/../' untuk naik satu tingkat ke folder layouts
include __DIR__ . '/../header.php'; 
include __DIR__ . '/../sidebar.php'; 
?>

<script src="https://cdn.tailwindcss.com"></script>

<div class="p-6 bg-gray-50 min-h-screen flex justify-center items-start">
    <div class="w-full max-w-2xl bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden transform transition-all hover:scale-[1.01]">
        
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-6">
            <h2 class="text-2xl font-bold text-white flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                <?= isset($item) ? 'Edit Data Restoran' : 'Tambah Restoran Baru' ?>
            </h2>
            <p class="text-blue-100 text-sm mt-1">Pastikan informasi yang dimasukkan sudah benar.</p>
        </div>

        <form method="POST" action="index.php?action=<?= isset($item) ? 'edit&id=' . $item['id'] : 'create' ?>" class="p-8 space-y-6">
            
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Nama Restoran</label>
                <input type="text" name="nama" value="<?= $item['nama'] ?? '' ?>" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 outline-none transition-all duration-200 placeholder-gray-400" 
                       placeholder="Masukkan nama lengkap restoran..." required>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Alamat Lengkap</label>
                <textarea name="alamat" rows="4" 
                          class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 outline-none transition-all duration-200 placeholder-gray-400" 
                          placeholder="Contoh: Jl. Sudirman No. 123, Jakarta Pusat..." required><?= $item['alamat'] ?? '' ?></textarea>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Nomor Telepon</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                        </svg>
                    </span>
                    <input type="text" name="telepon" value="<?= $item['telepon'] ?? '' ?>" 
                           class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 outline-none transition-all duration-200" 
                           placeholder="Contoh: 021-1234567">
                </div>
            </div>

            <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-100">
                <a href="index.php" class="px-6 py-3 text-sm font-bold text-gray-500 hover:text-gray-700 transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-200 transform active:scale-95 transition-all">
                    <?= isset($item) ? 'Simpan Perubahan' : 'Simpan Restoran' ?>
                </button>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../footer.php'; ?>