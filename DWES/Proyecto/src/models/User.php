<?php
namespace Models;

class User {
    private $id;
    private $nombre;
    private $apellidos;
    private $dni;
    private $usuario;
    private $password;
    private $email;
    private $es_secretario;
    private $primer_login;

    // Getters y setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function getDni() {
        return $this->dni;
    }

    public function setDni($dni) {
        $this->dni = $dni;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEsSecretario() {
        return $this->es_secretario;
    }

    public function setEsSecretario($es_secretario) {
        $this->es_secretario = $es_secretario;
    }

    public function getPrimerLogin() {
        return $this->primer_login;
    }

    public function setPrimerLogin($primer_login) {
        $this->primer_login = $primer_login;
    }

    public function generarUsuario() {
        $nombre = mb_substr($this->nombre, 0, 1);
        $apellido1 = mb_substr($this->apellidos, 0, 3);
        $apellido2 = mb_substr(strstr($this->apellidos, ' '), 1, 3);
        $dni_digits = substr($this->dni, -3);
        return strtolower($nombre . $apellido1 . $apellido2 . $dni_digits);
    }
}
