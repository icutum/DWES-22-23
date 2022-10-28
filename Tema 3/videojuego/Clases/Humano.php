<?php
    namespace Clases;

    class Humano implements \Interfaces\Personaje {
        use \Rasgos\Coordenadas;

        public function atacar(): string {
            return "Puñetazo";
        }

        public function defender(): string {
            return "Bloqueo";
        }
    }
?>