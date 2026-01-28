<?php
include_once 'config/database.php';
include_once 'models/Restoran.php';

class RestoranController {
    private $model;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->model = new Restoran($db);
    }

    public function handleRequest() {
        $action = $_GET['action'] ?? 'list';
        $id = $_GET['id'] ?? null;

        // LOGIKA DELETE
        if ($action == 'delete' && $id) {
            $this->model->delete($id);
            header("Location: index.php");
            exit;
        }

        // LOGIKA SAVE / UPDATE (POST)
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $telepon = $_POST['telepon'];

            if ($id) {
                $this->model->update($id, $nama, $alamat, $telepon);
            } else {
                $this->model->save($nama, $alamat, $telepon);
            }
            header("Location: index.php");
            exit;
        }

        // ROUTING VIEW
        switch ($action) {
            case 'create':
            case 'edit':
                $item = ($id) ? $this->model->getById($id) : null;
                include 'views/layouts/restoran/form.php';
                break;
            case 'detail':
                $item = $this->model->getById($id);
                include 'views/layouts/restoran/detail.php';
                break;
            case 'list':
            default:
                $data = $this->model->getAll();
                include 'views/layouts/restoran/list.php';
                break;
        }
    }
}