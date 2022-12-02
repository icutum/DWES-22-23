<?php
    namespace Exam;

    class ExamenFacil extends AExamen {
        private const MIN = 5;
        private const MAX = 10;

        public function obtenerNota(): int {
            return rand(self::MIN, self::MAX);
        }
    }
?>