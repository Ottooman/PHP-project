<?php
class Product {
    private $db;
    public function __construct() {
        $obj = new DB();
        $this->db = $obj->pdo;
    }
    public function getAllProducts() {
        $sql = 'SELECT * FROM products';
        $data = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function getSearchProducts($search) {
        $search = "%$search%";
        $sql = "SELECT * FROM products WHERE productName LIKE :search OR productDescription LIKE :search";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':search' => $search]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function getCheapestProducts($no = 1) {
        $sql = "SELECT * FROM products ORDER BY MSRP ASC LIMIT :noOfProducts";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':noOfProducts', $no, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}