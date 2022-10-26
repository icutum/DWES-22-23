<?php
    interface PlataformaPago {
        public function establecerConexion(): void;
        public function compruebaSeguridad(): void;
        public function pagar(string $cuenta, int $cantidad): void;
    }
?>