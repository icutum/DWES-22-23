<?php
    namespace Exam;

    class ExamenChungo extends AExamen {
        private const MIN = 0;
        private const MAX = 7;

        public function obtenerNota(): int {
            return rand(self::MIN, self::MAX);
        }
    }
?>