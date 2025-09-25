<?php
class Product {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Ambil semua produk
    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM products ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    // Insert produk baru
    public function insert($data) {
        // pastikan fitur diproses dengan benar
        $features = isset($data['features']) ? json_encode($data['features']) : null;

        // hash password admin (supaya aman, bukan plain text)
        $passwordHash = !empty($data['admin_password']) ? password_hash($data['admin_password'], PASSWORD_BCRYPT) : null;

        $sql = "INSERT INTO products 
                (name, sku, price, admin_password_hash, type, features, category, description) 
                VALUES (:name, :sku, :price, :admin_password_hash, :type, :features, :category, :description)";
        
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':name' => $data['name'],
            ':sku' => $data['sku'],
            ':price' => $data['price'],
            ':admin_password_hash' => $passwordHash,
            ':type' => $data['type'],
            ':features' => $features,
            ':category' => $data['category'],
            ':description' => $data['description']
        ]);
    }
}
