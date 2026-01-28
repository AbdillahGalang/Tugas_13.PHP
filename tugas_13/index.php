<?php
/**
 * File: index.php
 * Deskripsi: Entry point aplikasi menggunakan pola Single Action Controller.
 */

// Memanggil controller
require_once 'controllers/RestoranController.php';

// Inisialisasi Controller
$controller = new RestoranController();

/**
 * Memanggil handleRequest() untuk mengatur alur CRUD.
 * Semua pengecekan action (create, edit, delete) dilakukan di dalam method ini.
 */
$controller->handleRequest();
?>