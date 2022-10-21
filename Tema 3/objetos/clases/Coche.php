<?php
    class Coche {
        private $matricula;
        private $marca;
        private $carga;

        public function __construct(string $matricula, string $marca, float $carga) {
            $this->matricula = $matricula;
            $this->marca = $marca;
            $this->carga = $carga;
        }

        public function getMatricula(): string {
            return $this->matricula;
        }

        public function setMatricula($matricula): void {
            $this->matricula = $matricula;
        }

        public function getMarca(): string {
            return $this->marca;
        }

        public function setMarca($marca): void {
            $this->marca = $marca;
        }

        public function getCarga(): float {
            return $this->carga;
        }

        public function setCarga($carga): void {
            $this->carga = $carga;
        }

        public function pintarInformacion(): void { ?>
            <p>Coche: <?= $this->matricula ?>, <?= $this->marca ?> con carga: <?= $this->carga ?>.</p>
        <?php }
    }
?>