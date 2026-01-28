<?php
class Restoran {
    private $conn;
    private $table = "restoran";

    public function __construct($db) {
        $this->conn = $db;
    }

    // [READ] Mengambil semua data
    public function getAll() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // [READ] Mengambil satu data berdasarkan ID
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // [CREATE] Simpan data baru
    public function save($nama, $alamat, $telepon) {
        $query = "INSERT INTO " . $this->table . " (nama, alamat, telepon) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$nama, $alamat, $telepon]);
    }

    // [UPDATE] Edit data
    public function update($id, $nama, $alamat, $telepon) {
        $query = "UPDATE " . $this->table . " SET nama=?, alamat=?, telepon=? WHERE id=?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$nama, $alamat, $telepon, $id]);
    }

    // [DELETE] Hapus data
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
}