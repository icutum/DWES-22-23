<?php
    class BancoMalvado implements PlataformaPago {
        public function establecerConexion(): void { ?>
            <p>Conexión Banco Malvado</p>
        <?php }

        public function compruebaSeguridad(): void { ?>
            <p>Conexión Segura Banco Malvado</p>
        <?php }

        public function pagar(string $cuenta, int $cantidad): void { ?>
            <p>Pago Realizado Banco Malvado</p>
        <?php }
    }
?>