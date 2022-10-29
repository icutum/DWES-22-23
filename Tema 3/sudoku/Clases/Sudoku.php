<?php
    namespace Clases;

    class Sudoku {
        private const FILAS_COLUMNAS = 9;

        private const NUM_MIN = 1;
        private const NUM_MAX = self::FILAS_COLUMNAS;

        private static Sudoku $instancia;
        public static array $tablero = [
            [5, 3, 4,   6, 7, 8,    9, 1, 2],
            [6, 7, 2,   1, 9, 5,    3, 4, 8],
            [1, 9, 8,   3, 4, 2,    5, 6, 7],

            [8, 5, 9,   7, 6, 1,    4, 2, 3],
            [4, 2, 6,   8, 5, 3,    7, 9, 1],
            [7, 1, 3,   9, 2, 4,    8, 5, 6],

            [9, 6, 1,   5, 3, 7,    2, 8, 4],
            [2, 8, 7,   4, 1, 9,    6, 3, 5],
            [3, 4, 5,   2, 8, 6,    1, 7, 9],
        ];

        public static function crearInstancia() {
            if (!isset(self::$instancia)) {
                self::$instancia = new Sudoku();
            }
            return self::$instancia;
        }

        // Genera un número aleatorio a partir del número mínimo y máximo
        private function numeroAleatorio(): int {
            return mt_rand(0, 1);
        }

        // Devuelve la fila y columna de la posición nula en un array, en de que no haya, devuelve [-1, -1]
        private function encontrarPosicionNula(array $tablero): array {
            for ($fila = 0; $fila < sizeof($tablero); $fila++) { 
                for ($columna = 0; $columna < sizeof($tablero[$fila]); $columna++) { 
                    if (!isset($tablero[$fila][$columna])) return [$fila, $columna]; 
                }
            }
            return [-1, -1];
        }

        // Comprobar si dicho número se encuentra en fila/columna/cuadrado
        private function usadoEnFila(array $tablero, int $fila, int $num): bool {
            for ($columna = 0; $columna < sizeof($tablero); $columna++) { 
                if ($tablero[$fila][$columna] == $num) return true;
            }
            return false;
        }

        private function usadoEnColumna(array $tablero, int $columna, int $num): bool {
            for ($fila = 0; $fila < sizeof($tablero); $fila++) { 
                if ($tablero[$fila][$columna] == $num) return true;
            }
            return false;
        }

        private function usadoEnCuadrado(array $tablero, int $fila, int $columna, int $num): bool {
            for ($i = 0; $i < sqrt(self::FILAS_COLUMNAS); $i++) { 
                for ($j = 0; $j < sqrt(self::FILAS_COLUMNAS); $j++) { 
                    if ($tablero[$i + $fila][$j + $columna] == $num) return true;
                }
            }
            return false;
        }

        // Función que combina las tres anteriores por comodidad
        private function numeroSeguro(array $tablero, int $fila, int $columna, int $num): bool {
            return usadoEnFila($tablero, $fila, $num)
                && usadoEnColumna($tablero, $columna, $num)
                && usandoEnCuadrado($tablero, $fila, $columna, $num);
        }

        // TODO: Cambiar la función
        private function resolverSudoku(): bool {
            $fila = $columna = 0;

            if (self::encontrarPosicionNula(self::$tablero, $fila, $columna)) return true;

            for ($num = self::NUM_MIN; $num <= self::NUM_MAX; $num++) { 
                if (numeroSeguro(self::$tablero, $fila, $columna, $num)) {
                    echo "mu bien";
                }
            }
        }

        public function eliminarPosiciones() {
            $posiciones = 40;

            for ($i = 0; $i < sizeof(self::$tablero); $i++) { 
                for ($j = 0; $j < sizeof(self::$tablero[$i]); $j++) {

                    if ($posiciones != 0 && self::numeroAleatorio() < 0.5) {
                        self::$tablero[$i][$j] = 0;
                        $posiciones--;
                    }
                }
            }
        }

        // Imprime el Sudoku
        public function getTablero(): void { ?>
            <table class="sudoku">
            <?php for ($i = 0; $i < self::FILAS_COLUMNAS; $i++) : 
                $bordeFila = $i % sqrt(self::FILAS_COLUMNAS) == 0; ?>
    
                <tr class="sudoku__row <?= $bordeFila ? "sudoku__row--bold" : "" ?>">
                    <?php for ($j = 0; $j < self::FILAS_COLUMNAS; $j++) : 
                        $bordeColumna = $j % sqrt(self::FILAS_COLUMNAS) == 0; ?>
                        
                        <td class="sudoku__column <?= $bordeColumna ? "sudoku__column--bold" : "" ?>">
                            <?php if(self::$tablero[$i][$j] == 0) : ?>
                                <select class="sudoku__select">
                                    <?php for ($k = self::NUM_MIN; $k <= self::NUM_MAX; $k++): ?>
                                        <option class="sudoku__select-option"><?= $k ?></option>
                                    <?php endfor; ?>
                                </select>
                            <?php else: ?>
                                <?= self::$tablero[$i][$j] ?>
                            <?php endif; ?>
                        </td>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
            </table>
        <?php }
    }
?>