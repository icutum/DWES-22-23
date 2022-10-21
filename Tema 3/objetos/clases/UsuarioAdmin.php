<?php
    class UsuarioAdmin extends Usuario {
        public function __construct(string $nombre, string $apellidos, string $deporte) {
            parent::__construct($nombre, $apellidos, $deporte);
            self::$numPartidos = 3;
        }
    }
?>