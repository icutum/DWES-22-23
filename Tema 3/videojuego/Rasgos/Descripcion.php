<?php
    namespace Rasgos;

    trait Descripcion {
        private string $descripcion;

        public function getDescripcion(): string {
            return $this->descripcion;
        }

        public function setDescripcion(string $descripcion): void {
            $this->descripcion = $descripcion;
        }
    }
?>