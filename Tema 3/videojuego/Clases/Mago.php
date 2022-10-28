<?php
    namespace Clases;

    abstract class Mago implements \Interfaces\Personaje {
        use \Rasgos\Coordenadas;

        public abstract function atacar(): string;

        public function defender(): string {
            return "Hechizo protector";
        }
    }
?>