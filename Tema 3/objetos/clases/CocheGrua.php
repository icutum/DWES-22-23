<?php
    class CocheGrua extends Coche {
        private $cocheCargado;

        public function __construct(string $matricula, string $marca, float $carga, Coche $cocheCargado = null) {
            parent::__construct($matricula, $marca, $carga);
            $this->cocheCargado = $cocheCargado;
        }

        public function cargar(Coche $cocheCargado) {
            $this->cocheCargado = $cocheCargado;
        }

        public function descargar() {
            $this->cocheCargado = null;
        }

        public function pintarInformacion(): void { ?>
            <p>
                <?= parent::pintarInformacion() ?>
                <?php if (isset($this->cocheCargado)) {
                    echo "Lleva coche:";
                    $this->cocheCargado->pintarInformacion();
                } else {
                    echo "No lleva ningún coche";
                } ?>
            </p>
        <?php }
    }
?>