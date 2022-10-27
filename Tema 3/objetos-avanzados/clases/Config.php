<?php
    class Config {
        private string $nombre;
        private static Config $instancia;

        private function __construct() {

        }

        public static function crearInstancia(): Config {
            if (!isset(self::$instancia)) {
                self::$instancia = new Config();
            }
            return self::$instancia;
        }

        public function getNombre(): string {
            return $this->nombre;
        }

        public function setNombre(string $nombre): void {
            $this->nombre = $nombre;
        }
    }
?>