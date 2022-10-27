<?php
    class BancoMaloMalisimo implements PlataformaPago {
        public function establecerConexion(): void { ?>
            <p>Conexión Banco Malo Malísimo</p>
        <?php }

        public function compruebaSeguridad(): void { ?>
            <p>Conexión Segura Banco Malo Malísimo</p>
        <?php }

        public function pagar(string $cuenta, int $cantidad): void { ?>
            <p>Pago Realizado Banco Malo Malísimo</p>
        <?php }
    }
?>