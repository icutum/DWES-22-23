<?php
    class Humano implements Personaje {
        public function atacar(): string {
            return "Puñetazo";
        }

        public function defender(): string {
            return "Bloqueo";
        }
    }
?>