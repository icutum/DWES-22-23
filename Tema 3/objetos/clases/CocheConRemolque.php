<?php
    class CocheConRemolque extends Coche {
        private $capacidadRemolque;

        public function __construct(string $matricula, string $marca, float $carga, float $capacidadRemolque) {
            parent::__construct($matricula, $marca, $carga);
            $this->capacidadRemolque = $capacidadRemolque;
        }

        public function getCapacidadRemolque(): float {
            return $this->capacidadRemolque;
        }

        public function setCapacidadRemolque($capacidadRemolque): void {
            $this->capacidadRemolque = $capacidadRemolque;
        }

        public function pintarInformacion(): void { ?>
            <p><?= parent::pintarInformacion() ?> y remolque de <?= $this->capacidadRemolque ?></p>
        <?php }
    }
?>