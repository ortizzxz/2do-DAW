<?php
namespace Repositories;

use Lib\Database;
use Models\Butaca;

class ButacaRepository {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function save(Butaca $butaca) {
        $stmt = $this->db->prepare("INSERT INTO butacas (fila, numero, estado) VALUES (?, ?, ?)");
        $stmt->execute([$butaca->getFila(), $butaca->getNumero(), $butaca->getEstado()]);
        $butaca->setId($this->db->lastInsertId());
    }

    public function findAll() {
        $stmt = $this->db->query("SELECT * FROM butacas");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function findById($id) {
        $stmt = $this->db->prepare("SELECT * FROM butacas WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function findByEstado($estado) {
        $stmt = $this->db->prepare("SELECT * FROM butacas WHERE estado = ?");
        $stmt->execute([$estado]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function actualizarEstado($id, $estado) {
        $stmt = $this->db->prepare("UPDATE butacas SET estado = ? WHERE id = ?");
        $stmt->execute([$estado, $id]);
    }

    public function update(Butaca $butaca) {
        $stmt = $this->db->prepare("UPDATE butacas SET estado = ? WHERE id = ?");
        $stmt->execute([$butaca->getEstado(), $butaca->getId()]);
    }
}