<?php
namespace Repositories;

use Lib\DataBase;
use Models\User;

class UserRepository {
    private $db;

    public function __construct() {
        $this->db = DataBase::getInstance()->getConnection();
    }

    public function save(User $user) {
        $stmt = $this->db->prepare("INSERT INTO usuarios (nombre, apellidos, dni, usuario, password, email, es_secretario, primer_login) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $user->getNombre(),
            $user->getApellidos(),
            $user->getDni(),
            $user->getUsuario(),
            password_hash($user->getPassword(), PASSWORD_DEFAULT),
            $user->getEmail(),
            $user->getEsSecretario(),
            $user->getPrimerLogin()
        ]);
    }

    public function findByUsuario($usuario) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $stmt->execute([$usuario]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    // Otros métodos como update, delete, etc.
}