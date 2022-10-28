<?php
    class Sudoku {
        private const NUM_MIN = 1;
        private const NUM_MAX = 9;

        private const FILAS_COLUMNAS = 9;
        private const PISTAS = 17;
        
        private static Sudoku $instancia;

        public function crearInstancia(): Sudoku {
            if(!isset(self::$instancia)) {
                self::$instancia = new Sudoku();
            }
            return self::$instancia;
        }

        public function crearTabla() {
            $pistasRestantes = self::PISTAS;

            ?><table class="sudoku"><?php
            for ($i = 0; $i < self::FILAS_COLUMNAS; $i++) : 
                $bordeFila = $i % sqrt(self::FILAS_COLUMNAS) == 0; ?>

                <tr class="sudoku__row <?= $bordeFila ? "sudoku__row--bold" : "" ?>">
                    <?php for ($j = 0; $j < self::FILAS_COLUMNAS; $j++) : 
                        $bordeColumna = $j % sqrt(self::FILAS_COLUMNAS) == 0; ?>

                        <td class="sudoku__column <?= $bordeColumna ? "sudoku__column--bold" : "" ?>">
                            <select>
                                <?php for ($k = 0; $k < self::FILAS_COLUMNAS; $j++) : ?>
                                    <option><?= $k // Bucle infinito ?></option>
                                <?php endfor; ?>
                            </select>
                        </td>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
            </table> 
        <?php }
    }
?>