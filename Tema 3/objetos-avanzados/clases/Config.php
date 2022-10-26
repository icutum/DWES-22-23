<?php
    class Config {
        private string $nombre;
        private static Config $instancia;

        private function __construct(string $nombre) {
            $this->nombre = $nombre;
        }

        public static function crearInstancia(string $nombre): Config {
            if (!isset(self::$instancia)) {
                self::$instancia = new Config($nombre);
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