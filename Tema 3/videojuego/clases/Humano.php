<?php
    class Humano implements Personaje {
        use Coordenadas;

        public function atacar(): string {
            return "Puñetazo";
        }

        public function defender(): string {
            return "Bloqueo";
        }
    }
?>