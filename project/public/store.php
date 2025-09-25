<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../app/Models/Product.php';

$productModel = new Product($pdo);

$features = isset($_POST['features']) ? implode(",", $_POST['features']) : "";

$data = [
    "name" => $_POST['name'],
    "sku" => $_POST['sku'],
    "price" => $_POST['price'],
    "admin_password_hash" => password_hash($_POST['admin_password'], PASSWORD_BCRYPT),
    "type" => $_POST['type'],
    "features" => $features,
    "category" => $_POST['category'],
    "description" => $_POST['description']
];

$productModel->insert($data);

header("Location: index.php");
exit;
