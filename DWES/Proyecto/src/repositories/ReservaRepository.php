<?php
namespace Repositories;

use Lib\Database;
use Models\Reserva;

class ReservaRepository {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function save(Reserva $reserva) {
        $stmt = $this->db->prepare("INSERT INTO reservas (usuario_id, butaca_id, fecha_reserva) VALUES (?, ?, ?)");
        $stmt->execute([$reserva->getUsuarioId(), $reserva->getButacaId(), $reserva->getFechaReserva()]);
        $reserva->setId($this->db->lastInsertId());
    }

    public function findByUsuario($usuario_id) {
        $stmt = $this->db->prepare("SELECT r.*, b.fila, b.numero FROM reservas r JOIN butacas b ON r.butaca_id = b.id WHERE r.usuario_id = ?");
        $stmt->execute([$usuario_id]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function findById($id) {
        $stmt = $this->db->prepare("SELECT * FROM reservas WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM reservas WHERE id = ?");
        $stmt->execute([$id]);
    }
}