<?php
    namespace Exam;

    abstract class AExamen implements IExamen {
        use TieneFecha;

        private $nombre;

        public function intentar(string $nombre) {
            $this->nombre = $nombre;
        }

        public function getNombre() {
            return $this->nombre;
        }
    }
?>