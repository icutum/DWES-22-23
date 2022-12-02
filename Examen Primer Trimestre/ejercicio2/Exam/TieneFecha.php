<?php
    namespace Exam;

    trait TieneFecha {
        private $fecha;

        public function getFecha() {
            return $this->fecha;
        }

        public function setFecha($fecha) {
            $this->fecha = $fecha;
        }
    }
?>