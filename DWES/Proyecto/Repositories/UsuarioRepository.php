<?php

namespace Repositories;

use Lib\BaseDatos;
use Models\Usuario;
use PDO;

class UsuarioRepository
{
    private BaseDatos $conexion;

    public function __construct()
    {
        $this->conexion = new BaseDatos();
    }

    // ==============================
    // Métodos de Registro y Creación
    // ==============================

    /**
     * Registra un nuevo usuario en la base de datos.
     */
    public function register(array $contacto)
    {
        $sql = "INSERT INTO usuario (nombre, apellido, apellido_dos, dni, usuario, password, email, es_secretario, primer_login) 
                VALUES (:nombre, :apellido, :apellido_dos, :dni, :usuario, :password, :email, :es_secretario, :primer_login)";

        // Hashear la contraseña
        $hashedPassword = password_hash($contacto[5], PASSWORD_BCRYPT);

        $stmt = $this->conexion->prepare($sql);

        // Asignar parámetros
        $stmt->bindParam(':nombre', $contacto[0], PDO::PARAM_STR);
        $stmt->bindParam(':apellido', $contacto[1], PDO::PARAM_STR);
        $stmt->bindParam(':apellido_dos', $contacto[2], PDO::PARAM_STR);
        $stmt->bindParam(':dni', $contacto[3], PDO::PARAM_STR);
        $stmt->bindParam(':usuario', $contacto[4], PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $stmt->bindParam(':email', $contacto[6], PDO::PARAM_STR);
        $stmt->bindParam(':es_secretario', $contacto[7], PDO::PARAM_INT);
        $stmt->bindParam(':primer_login', $contacto[8], PDO::PARAM_INT);

        return $stmt->execute();
    }

    // ==============================
    // Métodos de Recuperación
    // ==============================

    /**
     * Devuelve todos los usuarios en la base de datos.
     */
    public function findAll()
    {
        $usuarios = [];
        $this->conexion->consulta("SELECT * FROM usuario");
        $usuariosData = $this->conexion->extraer_todos();

        foreach ($usuariosData as $usuarioData) {
            $usuarios[] = Usuario::fromArray($usuarioData);
        }

        return $usuarios;
    }

    /**
     * Busca un usuario por su ID.
     */
    public function findById($id)
    {
        $sql = "SELECT * FROM usuario WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Busca un usuario por su DNI.
     */
    public function findByDNI(string $dni)
    {
        $sql = "SELECT * FROM usuario WHERE dni = :dni";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene un usuario por su email.
     */
    public function getUserByEmail($email)
    {
        $sql = "SELECT id, email, usuario FROM usuario WHERE email = :email LIMIT 1";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Busca el ID de un usuario usando su email.
     */
    public function findIdByEmail(string $email)
    {
        $sql = "SELECT id FROM usuario WHERE email = :email";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Busca un usuario por su nombre de usuario.
     */
    public function findByUsername($username)
    {
        $sql = "SELECT * FROM usuario WHERE usuario = :usuario";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':usuario', $username, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ==============================
    // Métodos de Actualización
    // ==============================

    /**
     * Actualiza los datos de un usuario.
     */
    public function updateUser($id, $nombre, $apellido, $correo)
    {
        $sql = "UPDATE usuario SET nombre = :nombre, apellido = :apellido, email = :correo WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':apellido', $apellido, PDO::PARAM_STR);
        $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * Elimina un usuario por su ID.
     */
    public function deleteUser($id)
    {
        $sql = "DELETE FROM usuario WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // ==============================
    // Gestión de Contraseñas y Tokens
    // ==============================

    /**
     * Guarda un token de restablecimiento de contraseña para un usuario.
     */
    public function savePasswordResetToken($userId, $token)
    {
        $sql = "UPDATE usuario SET reset_token = :token WHERE id = :userId";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':token', $token, PDO::PARAM_STR);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * Obtiene un usuario por su token de restablecimiento.
     */
    public function getUserByResetToken($token)
    {
        $sql = "SELECT id, email, usuario FROM usuario WHERE reset_token = :token LIMIT 1";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':token', $token, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Restablece la contraseña usando un token de restablecimiento.
     */
    public function resetPasswordWithToken($token, $newPassword)
    {
        $sql = "SELECT id FROM usuario WHERE reset_token = :token LIMIT 1";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':token', $token, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
            $updateSql = "UPDATE usuario SET password = :password, reset_token = NULL, primer_login = 0 WHERE id = :id";
            $updateStmt = $this->conexion->prepare($updateSql);
            $updateStmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
            $updateStmt->bindParam(':id', $user['id'], PDO::PARAM_INT);
            return $updateStmt->execute();
        }

        return false;
    }

    /**
     * Restablece la contraseña de un usuario usando su correo electrónico.
     */
    public function resetPassword($correo, $newPassword)
    {
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        $sql = "UPDATE usuario SET password = :password, reset_token = NULL, primer_login = 0 WHERE email = :correo";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
        return $stmt->execute();
    }
}
