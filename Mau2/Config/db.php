<?php

class DB {
    private $host = "103.57.220.210";
    private $dbname = "fnxxiqfbhosting_ASM";
    private $username = "fnxxiqfbhosting_Group_NMN";
    private $password = "_}%I;bXl^8*+/tb";
    private $charset = "utf8";
    private $pdo;

    public function __construct() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset={$this->charset}";
            $this->pdo = new PDO($dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Ket noi that bai: " . $e->getMessage();
            exit;
        }
    }

    public function connect() {
        return $this->pdo;
    }
}
