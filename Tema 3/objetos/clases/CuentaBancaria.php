<?php
    class CuentaBancaria {
        private static $uuid = 100001;
        private $numeroCuenta;
        private $nombre;
        private $saldo;

        public function __construct(string $nombre = "anonimo", float $saldo = 0) {
            $this->numeroCuenta = CuentaBancaria::$uuid;
            CuentaBancaria::$uuid++;
            $this->nombre = $nombre;
            $this->saldo = $saldo;
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

        public function transferir(CuentaBancaria $cuenta, float $cantidad): void {
            $this->saldo -= $cantidad;
            $cuenta->saldo += $cantidad;
        }

        public function unir(CuentaBancaria $cuenta): void {
            $this->saldo += $cuenta->saldo;
            $cuenta->numeroCuenta = -1;
            $cuenta->bancarrota();
        }

        public function bancarrota(): void {
            $this->saldo = 0;
        }

        public function mostrar(): void { ?>
            <div id="<?= $this->numeroCuenta; ?>">
                <p>Número de cuenta <b><?= $this->numeroCuenta; ?></b></p>
                <p>Nombre del propietario: <?= $this->nombre; ?></p>
                <p>Saldo: <?= $this->saldo; ?></p>
            </div>
            <br>
            <hr>
        <?php }
    }
?>