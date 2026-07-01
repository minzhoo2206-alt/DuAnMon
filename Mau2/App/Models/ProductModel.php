<?php
class ProductModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllProducts()
    {
        $stmt = $this->db->query("SELECT * FROM Products");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM Products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createProduct($title, $description, $image)
    {
        $stmt = $this->db->prepare("INSERT INTO Products (title, description, image) VALUES (?, ?, ?)");
        return $stmt->execute([$title, $description, $image]);
    }

    public function updateProduct($id, $title, $description, $image)
    {
        $stmt = $this->db->prepare("UPDATE Products SET title=?, description=?, image=? WHERE id=?");
        return $stmt->execute([$title, $description, $image, $id]);
    }

    public function deleteProduct($id)
    {
        $stmt = $this->db->prepare("DELETE FROM Products WHERE id=?");
        return $stmt->execute([$id]);
    }
}
