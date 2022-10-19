<?php
    class CuentaBancaria {
        private $numeroCuenta = 100001;
        private $nombre;
        private $saldo;

        public function __construct(string $nombre = "anonimo", float $saldo = 0) {
            $this->numeroCuenta++;
        }

        public function ingresarDinero(int $cantidad): void {
            $this->saldo += $cantidad;
        }

        public function retirarDinero(int $cantidad): void {
            $this->saldo -= $cantidad;
        }

        public function mostrarSaldo(): float {
            return $this->saldo;
        }

        public function transferir(CuentaBancaria $cuenta, int $cantidad): void {
            $this->saldo -= $cantidad;
            $cuenta->saldo += $cantidad;
        }

        public function unir(CuentaBancaria $cuenta): void {
            $this->saldo += $cuenta->saldo;
            $cuenta->numeroCuenta = -1;
            $cuenta->saldo = 0;
        }

        public function bancarrota(): void {
            $this->saldo = 0;
        }

        public function mostrar(): void { ?>
            <div id="<?= $this->numeroCuenta; ?>">
                <p>Número de cuenta <b><?= $this->nombre; ?></b></p>
                <p>Nombre del propietario: <?= $this->nombre; ?></p>
                <p>Saldo: <?= $this->saldo; ?></p>
            </div>
        <?php }
    }
?>