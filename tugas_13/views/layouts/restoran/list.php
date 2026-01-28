<?php include 'views/layouts/header.php'; ?>
<?php include 'views/layouts/sidebar.php'; ?>

<script src="https://cdn.tailwindcss.com"></script>
<style>
    .fade-in { animation: fadeIn 0.5s ease-in-out; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
</style>

<div class="p-6 bg-gray-50 min-h-screen fade-in">
    <div class="max-w-7xl mx-auto">
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 sticky top-6 transition-all duration-300 hover:shadow-2xl">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <span class="bg-blue-500 w-2 h-8 rounded-full mr-3"></span>
                        <?= isset($item) ? 'Edit Restoran' : 'Tambah Restoran' ?>
                    </h3>
                    
                    <form method="POST" action="index.php?action=<?= isset($item) ? 'edit&id='.$item['id'] : 'create' ?>" class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-600 mb-1">Nama Restoran</label>
                            <input type="text" name="nama" value="<?= $item['nama'] ?? '' ?>" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all" 
                                   placeholder="Contoh: Resto Nusantara" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-600 mb-1">Alamat</label>
                            <textarea name="alamat" rows="3" 
                                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all" 
                                      placeholder="Alamat lengkap..." required><?= $item['alamat'] ?? '' ?></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-600 mb-1">Telepon</label>
                            <input type="text" name="telepon" value="<?= $item['telepon'] ?? '' ?>" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all" 
                                   placeholder="0812xxxx">
                        </div>
                        
                        <div class="pt-2 flex gap-2">
                            <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition-colors duration-200 transform active:scale-95">
                                <?= isset($item) ? 'Simpan Perubahan' : 'Simpan Restoran' ?>
                            </button>
                            <?php if(isset($item)): ?>
                                <a href="index.php" class="bg-gray-200 hover:bg-gray-300 text-gray-700 py-2 px-4 rounded-lg transition-all">Batal</a>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                    <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-white">
                        <h3 class="text-xl font-bold text-gray-800">Daftar Restoran</h3>
                        <span class="px-3 py-1 bg-blue-100 text-blue-600 text-xs font-bold rounded-full">Total: <?= $data->rowCount() ?></span>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-gray-50 uppercase text-xs font-bold text-gray-500 border-b">
                                <tr>
                                    <th class="px-6 py-4">Informasi Restoran</th>
                                    <th class="px-6 py-4">Alamat</th>
                                    <th class="px-6 py-4 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <?php if($data->rowCount() > 0): ?>
                                    <?php while ($row = $data->fetch(PDO::FETCH_ASSOC)): ?>
                                    <tr class="hover:bg-blue-50 transition-colors duration-150 group">
                                        <td class="px-6 py-4">
                                            <div class="font-bold text-gray-800 group-hover:text-blue-600 transition-colors"><?= htmlspecialchars($row['nama']) ?></div>
                                            <div class="text-xs text-gray-400 italic"><?= htmlspecialchars($row['telepon'] ?? '-') ?></div>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-600"><?= htmlspecialchars($row['alamat']) ?></td>
                                        <td class="px-6 py-4">
                                            <div class="flex justify-center gap-2">
                                                <a href="index.php?action=edit&id=<?= $row['id'] ?>" 
                                                   class="p-2 bg-yellow-100 text-yellow-600 rounded-lg hover:bg-yellow-600 hover:text-white transition-all duration-200 shadow-sm" 
                                                   title="Edit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </a>
                                                <a href="index.php?action=delete&id=<?= $row['id'] ?>" 
                                                   onclick="return confirm('Hapus restoran ini?')"
                                                   class="p-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-600 hover:text-white transition-all duration-200 shadow-sm" 
                                                   title="Hapus">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="3" class="px-6 py-10 text-center text-gray-400 italic">Belum ada data restoran.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include 'views/layouts/footer.php'; ?>