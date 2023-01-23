<?php
session_start();
require_once '../config/Database.php';
require_once '../config/Crud.php';

$obj = new Crud();

// ambil id product
$id_product = $_GET['id'];
// hapus data
$obj->delete('product', ["id_product = $id_product"]);

echo "<script>
        alert('data product berhasil dihapus');
        document.location.href='index.php';
      </script>";