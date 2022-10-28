<?php
    namespace Clases;

    class Objeto {
        use \Rasgos\Descripcion, \Rasgos\Coordenadas;
        private float $peso;

        public function getPeso(): float {
            return $this->peso;
        }

        public function setPeso(float $peso): void {
            $this->peso = $peso;
        }
    }
?>