<?php
    namespace Exam;

    class ExamenHP extends AExamen {
        // Como en el enunciado decía que el método obtenerNota()
        // tenía que devolver un int, he cambiado los valores min y max a 3 y 4
        private const MIN = 3;
        private const MAX = 4;

        public function obtenerNota(): int {
            return rand(self::MIN, self::MAX);
        }
    }
?>