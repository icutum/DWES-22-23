<?php
    class UsuarioPremium extends Usuario {
        public function __construct(string $nombre, string $apellidos, string $deporte) {
            parent::__construct($nombre, $apellidos, $deporte);
            $this->numPartidos = 3;
        }
    }
?>