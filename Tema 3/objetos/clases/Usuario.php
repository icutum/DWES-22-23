<?php
    class Usuario {
        private const PARTIDOS = 6;
        private const NIVEL_MIN = 0;
        private const NIVEL_MAX = 6;

        private $nombre;
        private $apellidos;
        private $deporte;
        private $nivel;
        private $partidos;

        public function __construct(string $nombre, string $apellidos, string $deporte) {
            $this->nombre = $nombre;
            $this->apellidos = $nombre;
            $this->deporte = $deporte;
            $this->nivel = NIVEL_MIN;
            $this->partidos = [];
            // Hacer partidos un array con texto de "victoria", "derrota", "empate" y que compare los 6 últimos elementos del array si se ha producido 6 victorias seguidas
        }

        public function introducirResultado(string $resultado): void {
            $this->partidos.push($resultado);

            switch ($resultado) {
                case "derrota":
                    echo "$this->nombre pierde el partido.";
                    break;

                case "empate":
                    echo "$this->nombre empata el partido.";
                    break;
                
                case "victoria":
                    echo "$this->nombre gana el partido.";
                    break;
            }
            
            $partidosSeguidos = true;
            for ($i = -1; $partidosSeguidos && $i < (PARTIDOS) * -1; $i--) { 
                $this->partidos[$i] != $resultado
                    ? $partidosSeguidos = false
                    : $partidosSeguidos;
            }

            if ($partidosSeguidos) {
                switch ($resultado) {
                    case "derrota":
                        if ($this->nivel != NIVEL_MIN) $this->nivel--;
                        break;
                    
                    case "victoria":
                        if ($this->nivel != NIVEL_MAX) $this->nivel++;
                        break;
                }
            }
        }

        public function imprimirInformación() { ?>
            <ul>
                <li>Nombre y Apellidos: </li>
                <li>Deporte: </li>
                <li>Nivel: </li>
                <li>Nivel: </li> <!-- Hacer lista anidada con victorias derrotas y empates -->
            </ul>
        <?php }
    }
?>