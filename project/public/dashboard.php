<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../app/Libraries/Form.php';
require_once __DIR__ . '/../app/Models/Product.php';

$productModel = new Product($pdo);
$products = $productModel->getAll();

$form = new Form("store.php", "POST");
$form->addText("name", "Nama Produk");
$form->addText("sku", "SKU");
$form->addText("price", "Harga");
$form->addPassword("admin_password", "Admin Password");
$form->addRadio("type", "Tipe", ["product" => "Produk", "service" => "Layanan"]);
$form->addCheckbox("features[]", "Fitur", ["fitur1"=>"Fitur 1","fitur2"=>"Fitur 2","fitur3"=>"Fitur 3"]);
$form->addSelect("category", "Kategori", ["elektronik"=>"Elektronik","fashion"=>"Fashion","jasa"=>"Jasa"]);
$form->addTextarea("description", "Deskripsi");
$form->addSubmit("Simpan");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Produk</title>
</head>
<body>
  <h1>Form Input Produk</h1>
  <?php $form->render(); ?>

  <h1>Daftar Produk</h1>
  <table border="1" cellpadding="5">
    <tr>
      <th>ID</th><th>Nama</th><th>SKU</th><th>Harga</th>
      <th>Tipe</th><th>Kategori</th><th>Fitur</th><th>Deskripsi</th>
    </tr>
    <?php foreach ($products as $p): ?>
      <tr>
        <td><?= $p['id'] ?></td>
        <td><?= htmlspecialchars($p['name']) ?></td>
        <td><?= htmlspecialchars($p['sku']) ?></td>
        <td><?= $p['price'] ?></td>
        <td><?= $p['type'] ?></td>
        <td><?= $p['category'] ?></td>
        <td><?= $p['features'] ?></td>
        <td><?= htmlspecialchars($p['description']) ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>
