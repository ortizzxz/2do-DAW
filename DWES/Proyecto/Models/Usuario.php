<?php
namespace Models;

use Lib\BaseDatos;

class Usuario
{
    private BaseDatos $conexion;
    private mixed $stmt;

    function __construct(
        private string|null $id = null,
        private string $nombre = '',
        private string $apellido = '',
        private string $apellidoDos = '',
        private string $dni = '',
        private string $usuario = '',
        private string $email = '',
        private string $password = '',
        private string $es_secretario = '',
        private string $primer_login = ''
    ) {
        $this->conexion = new BaseDatos();
    }

    public static function fromArray(array $data): Usuario
    {
        return new Usuario(
            $data['id'] ?? '',
            $data['nombre'] ?? '',
            $data['apellido'] ?? '',
            $data['dni'] ?? '',
            $data['usuario'] ?? '',
            $data['email'] ?? '',
            $data['password'] ?? '',
            $data['es_secretario'] ?? '',
            $data['primer_login'] ?? ''
        );
    }

    // Getters and Setters
    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getApellido(): string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): void
    {
        $this->apellido = $apellido;
    }

    public function getDni(): string
    {
        return $this->dni;
    }

    public function setDni(string $dni): void
    {
        $this->dni = $dni;
    }

    public function getUsuario(): string
    {
        return $this->usuario;
    }

    public function setUsuario(string $usuario): void
    {
        $this->usuario = $usuario;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getEsSecretario(): string
    {
        return $this->es_secretario;
    }

    public function setEsSecretario(string $es_secretario): void
    {
        $this->es_secretario = $es_secretario;
    }

    public function getPrimerLogin(): string
    {
        return $this->primer_login;
    }

    public function setPrimerLogin(string $primer_login): void
    {
        $this->primer_login = $primer_login;
    }
}
