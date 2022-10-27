<?php
    abstract class Mago implements Personaje {
        use Coordenadas;

        public abstract function atacar(): string;

        public function defender(): string {
            return "Hechizo protector";
        }
    }
?>