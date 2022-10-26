<?php
    trait Coordenadas {
        private int $x;
        private int $y;
        private int $z;

        public function getX(): int {
            return $this->x;
        }

        public function setX(int $x): void {
            $this->x = $x;
        }

        public function getY(): int {
            return $this->y;
        }

        public function setY(int $y): void {
            $this->y = $y;
        }

        public function getZ(): int {
            return $this->y;
        }

        public function setZ(int $y): void {
            $this->y = $y;
        }
    }
?>