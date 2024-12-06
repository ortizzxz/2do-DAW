<?php

namespace Controllers;

use Lib\Pages;
use Services\UsuarioService;

class UsuarioController
{
    private UsuarioService $service;
    private Pages $pages;

    public function __construct()
    {
        $this->service = new UsuarioService();
        $this->pages = new Pages();
    }

    // ==============================
    // Formularios de Usuario
    // ==============================

    public function registerForm()
    {
        $this->pages->render('auth/register');
    }

    public function loginForm()
    {
        $errors = isset($_GET['errors']) ? json_decode(urldecode($_GET['errors']), true) : [];
        $usuario = isset($_GET['usuario']) ? $_GET['usuario'] : '';
        $this->pages->render('auth/login', ['errors' => $errors, 'usuario' => $usuario]);
    }

    public function changePasswordForm()
    {
        $this->pages->render('auth/reset_password');
    }

    // ==============================
    // Registro de Usuario
    // ==============================

    public function registrar()
    {
        $usuarioValues = [];
        $errors = [];

        // Obtener y limpiar los datos del formulario
        $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
        $apellido = isset($_POST['apellido']) ? trim($_POST['apellido']) : '';
        $apellidoDos = isset($_POST['apellidoDos']) ? trim($_POST['apellidoDos']) : '';
        $DNI = isset($_POST['DNI']) ? trim($_POST['DNI']) : '';
        $correo = isset($_POST['correo']) ? trim($_POST['correo']) : '';

        // Validar DNI
        if ($this->service->findByDNI($DNI)) {
            $errors[] = 'El DNI se encuentra registrado en nuestra Base De Datos';
        }

        // Validar email
        if ($this->service->getUserByEmail($correo)) {
            $errors[] = 'El Email se encuentra registrado en nuestra Base De Datos';
        }

        // Validaciones
        if (empty($nombre)) {
            $errors[] = 'El campo Nombre es obligatorio.';
        } elseif (strlen($nombre) < 3) {
            $errors[] = 'El Nombre debe tener al menos 3 caracteres.';
        }

        if (empty($apellido)) {
            $errors[] = 'El campo Apellido es obligatorio.';
        } elseif (strlen($apellido) < 3) {
            $errors[] = 'El Apellido debe tener al menos 3 caracteres.';
        }

        // Validar el segundo apellido solo si se proporciona
        if (!empty($apellidoDos) && strlen($apellidoDos) < 3) {
            $errors[] = 'El Segundo Apellido debe tener al menos 3 caracteres.';
        }

        if (empty($correo)) {
            $errors[] = 'El campo Correo es obligatorio.';
        } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'El correo electrónico no tiene un formato válido.';
        }

        // Si hay errores, redirigir con errores al formulario
        if (!empty($errors)) {
            $errorString = urlencode(json_encode($errors));
            $redirectUrl = BASE_URL . "?controller=Usuario&action=registerForm&errors={$errorString}&nombre=" . urlencode($nombre) . "&apellido=" . urlencode($apellido) . "&correo=" . urlencode($correo);
            header("Location: {$redirectUrl}");
            exit;
        }

        // Generar el nombre de usuario
        $usuario = strtolower(substr($nombre, 0, 1)) . strtolower(substr($apellido, 0, 3));
        if (!empty($apellidoDos)) {
            $usuario .= strtolower(substr($apellidoDos, 0, 3));
        }
        $dniNumeros = preg_replace('/\D/', '', $DNI);
        $usuario .= substr($dniNumeros, -3);

        // Rellenar los valores del usuario
        $usuarioValues = [
            $nombre,
            $apellido,
            !empty($apellidoDos) ? $apellidoDos : '',
            $DNI,
            $usuario,
            "1234", // Contraseña predeterminada
            $correo,
            0, // es_secretario
            1  // primer_login
        ];

        // Registrar usuario y enviar correo de confirmación
        if ($this->service->register($usuarioValues)) {
            $newUserInfo = $this->service->getUserByEmail($correo);
            if ($newUserInfo) {
                $this->sendPasswordResetEmail($newUserInfo);
            }
            $this->pages->render("auth/success");
        }
    }

    private function sendPasswordResetEmail($user)
    {
        if (!isset($user['id'], $user['email'], $user['usuario'])) {
            echo 'error';
            return;
        }

        $token = bin2hex(random_bytes(32));
        $this->service->savePasswordResetToken($user['id'], $token);

        $resetLink = BASE_URL . "?controller=Usuario&action=resetPassword&token=" . $token;
        $message = "
            <html>
            <body>
                <h2>Hola {$user['usuario']}</h2>
                <p>Por favor, haz clic en el siguiente enlace para cambiar tu contraseña:</p>
                <a href='{$resetLink}'>Cambiar mi contraseña</a>
            </body>
            </html>";

        $headers = "MIME-Version: 1.0\r\nContent-type:text/html;charset=UTF-8\r\nFrom: noreply@tudominio.com\r\n";
        if (!mail($user['email'], "Cambio de contraseña requerido", $message, $headers)) {
            echo 'error';
        }
    }

    // ==============================
    // Inicio de Sesión y Logout
    // ==============================

    public function logIn()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = isset($_POST['usuario']) ? trim($_POST['usuario']) : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';

            $errors = [];
            if (empty($usuario)) $errors[] = 'El campo Usuario es obligatorio.';
            if (empty($password)) $errors[] = 'El campo Contraseña es obligatorio.';

            if (empty($errors)) {
                $result = $this->service->authenticate($usuario, $password);
                if ($result) {
                    $_SESSION['user_id'] = $result['id'];
                    $_SESSION['user_name'] = $result['nombre'];
                    $_SESSION['es_secretario'] = $result['es_secretario'];

                    $redirectUrl = $result['primer_login'] == 1
                        ? "?controller=Usuario&action=changePasswordForm"
                        : ($result['es_secretario'] == 1
                            ? "?controller=Admin&action=dashboard"
                            : "?controller=Butaca&action=userDashboard");

                    header("Location: " . BASE_URL . $redirectUrl);
                    exit;
                } else {
                    $errors[] = 'Usuario o contraseña incorrectos.';
                }
            }

            if (!empty($errors)) {
                $errorString = urlencode(json_encode($errors));
                header("Location: " . BASE_URL . "?controller=Usuario&action=loginForm&errors={$errorString}&usuario=" . urlencode($usuario));
                exit;
            }
        } else {
            $this->loginForm();
        }
    }

    public function logOut()
    {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . "?controller=Usuario&action=loginForm");
        exit;
    }

    // ==============================
    // Restablecimiento de Contraseña
    // ==============================

    public function resetPassword()
    {
        $token = $_GET['token'] ?? null;
        if ($token) {
            $user = $this->service->getUserByResetToken($token);
            if ($user) {
                $this->pages->render('auth/reset_password', ['token' => $token]);
            } else {
                $this->pages->render('error', ['message' => 'Token inválido o expirado']);
            }
        } else {
            $this->pages->render('error', ['message' => 'Token no proporcionado']);
        }
    }

    public function updatePasswordWithToken()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = $_POST['token'];
            $newPassword = $_POST['new_password'];
            $confirmPassword = $_POST['confirm_password'];

            if ($newPassword === $confirmPassword) {
                if ($this->service->resetPasswordWithToken($token, $newPassword)) {
                    $this->pages->render("auth/success");
                } else {
                    $this->pages->render('auth/reset_password', ['error' => 'No se pudo restablecer la contraseña']);
                }
            } else {
                $this->pages->render('auth/reset_password', ['error' => 'Las contraseñas no coinciden']);
            }
        }
    }

    public function updatePassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $correo = $_POST['email'];
            $newPassword = $_POST['new_password'];
            $confirmPassword = $_POST['confirm_password'];

            if ($newPassword === $confirmPassword) {
                if ($this->service->resetPassword($correo, $newPassword)) {
                    $this->pages->render("auth/success");
                } else {
                    $this->pages->render('auth/reset_password', ['error' => 'No se pudo restablecer la contraseña']);
                }
            } else {
                $this->pages->render('auth/reset_password', ['error' => 'Las contraseñas no coinciden']);
            }
        }
    }
}
