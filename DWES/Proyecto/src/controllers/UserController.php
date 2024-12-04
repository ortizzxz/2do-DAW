<?php
namespace Controllers;

use Services\UserService;
use Models\User;
use Lib\Pages;

class UserController {
    private $userService;
    private $pages;

    public function __construct() {
        $this->userService = new UserService();
        $this->pages = new Pages();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            if ($this->userService->login($usuario, $password)) {
                header('Location: /dashboard');
            } else {
                $this->pages->render('users/login', ['error' => 'Credenciales inválidas']);
            }
        } else {
            $this->pages->render('users/login');
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            $user->setNombre($_POST['nombre']);
            $user->setApellidos($_POST['apellidos']);
            $user->setDni($_POST['dni']);
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);
            $user->setEsSecretario(false);

            if ($this->userService->registerUser($user)) {
                $this->pages->render('users/register_success');
            } else {
                $this->pages->render('users/register', ['error' => 'Error al registrar el usuario']);
            }
        } else {
            $this->pages->render('users/register');
        }
    }

    public function logout() {
        $this->userService->logout();
        header('Location: /');
    }
}