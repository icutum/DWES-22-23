<?php
    class BitcoinConan implements PlataformaPago {
        public function establecerConexion(): void { ?>
            <p>Conexión Banco Bitcoin Conan</p>
        <?php }

        public function compruebaSeguridad(): void { ?>
            <p>Conexión Segura Banco Bitcoin Conan</p>
        <?php }

        public function pagar(string $cuenta, int $cantidad): void { ?>
            <p>Pago Realizado Banco Bitcoin Conan</p>
        <?php }
    }
?>