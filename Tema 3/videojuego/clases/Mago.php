<?php
    abstract class Mago implements Personaje {
        public abstract function atacar(): string;

        public function defender(): string {
            return "Hechizo protector";
        }
    }
?>