<?php
// src/Services/UserService.php
namespace Services;

use Models\User;
use Repositories\UserRepository;

class UserService {
    private $userRepository;

    public function __construct() {
        $this->userRepository = new UserRepository();
    }

    public function registerUser(User $user) {
        $user->setUsuario($user->generarUsuario());
        $user->setPrimerLogin(true);
        $this->userRepository->save($user);
        // Aquí iría la lógica para enviar el email con la contraseña
    }

    public function login($usuario, $password) {
        $user = $this->userRepository->findByUsuario($usuario);
        if ($user && password_verify($password, $user['password'])) {
            // Iniciar sesión
            $_SESSION['user_id'] = $user['id'];
            return true;
        }
        return false;
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
    }

    // Otros métodos como cambiarContraseña, etc.
}