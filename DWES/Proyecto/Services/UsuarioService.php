<?php

namespace Services;

use Repositories\UsuarioRepository;

class UsuarioService
{
    private UsuarioRepository $repository;

    public function __construct()
    {
        $this->repository = new UsuarioRepository();
    }

    // ==============================
    // Registro y Gestión de Usuarios
    // ==============================

    /**
     * Registra un nuevo usuario en el sistema.
     */
    public function register(array $contacto)
    {
        return $this->repository->register($contacto);
    }

    /**
     * Obtiene todos los usuarios.
     */
    public function findAll()
    {
        return $this->repository->findAll();
    }

    /**
     * Busca un usuario por su ID.
     */
    public function findById($id)
    {
        return $this->repository->findById($id);
    }

    /**
     * Busca un usuario por su email.
     */
    public function getUserByEmail($email)
    {
        return $this->repository->getUserByEmail($email);
    }

    /**
     * Encuentra el ID de un usuario usando su email.
     */
    public function findIdByEmail($email)
    {
        return $this->repository->findIdByEmail($email);
    }

    /**
     * Busca un usuario por su DNI.
     */
    public function findByDNI($DNI)
    {
        return $this->repository->findByDNI($DNI);
    }

    /**
     * Actualiza la información de un usuario.
     */
    public function updateUser($id, $nombre, $apellido, $correo)
    {
        return $this->repository->updateUser($id, $nombre, $apellido, $correo);
    }

    /**
     * Elimina un usuario por su ID.
     */
    public function deleteUser($id)
    {
        return $this->repository->deleteUser($id);
    }

    // ==============================
    // Autenticación
    // ==============================

    /**
     * Autentica a un usuario mediante su nombre de usuario y contraseña.
     */
    public function authenticate($usuario, $password)
    {
        $user = $this->repository->findByUsername($usuario);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    // ==============================
    // Gestión de Tokens de Restablecimiento
    // ==============================

    /**
     * Guarda un token de restablecimiento de contraseña para un usuario.
     */
    public function savePasswordResetToken($userId, $token)
    {
        return $this->repository->savePasswordResetToken($userId, $token);
    }

    /**
     * Obtiene un usuario usando un token de restablecimiento de contraseña.
     */
    public function getUserByResetToken($token)
    {
        return $this->repository->getUserByResetToken($token);
    }

    // ==============================
    // Restablecimiento de Contraseña
    // ==============================

    /**
     * Restablece la contraseña usando un token de restablecimiento.
     */
    public function resetPasswordWithToken($token, $newPassword)
    {
        $this->repository->resetPasswordWithToken($token, $newPassword);
    }

    /**
     * Restablece la contraseña de un usuario usando su correo electrónico.
     */
    public function resetPassword($correo, $newPassword)
    {
        $this->repository->resetPassword($correo, $newPassword);
    }

    // ==============================
    // Otros Métodos
    // ==============================

    /**
     * Devuelve el número de filas afectadas en la última operación.
     * (Método actualmente vacío)
     */
    public function filasAfectadas()
    {
        // Implementar si es necesario
    }
}
