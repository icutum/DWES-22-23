<?php
    namespace Classes;

    class Board {
        private static $board;
        private static $errors;
        private const ROWS_COLUMNS = 3;
        private const TURNS = [
            "CROSS" => "X",
            "CIRCLE" => "O"
        ];
        private const COORDS = [
            "x", "y"
        ];
        private const FILE_PATH = "./tabla.csv";

        public function __construct() {
            self::$board = [];
            self::$errors = [];
        }

        public function loadTable() {
            $file = @file_get_contents(self::FILE_PATH);
            
            if (empty($file)) {
                for ($i = 0; $i < self::ROWS_COLUMNS; $i++) { 
                    for ($j = 0; $j < self::ROWS_COLUMNS; $j++) { 
                        self::$board[$i][$j] = "&nbsp;";
                    }
                }
            } else {
                foreach (explode("\n", $file) as $row) {
                    foreach (explode(",", $row) as $column) {
                        self::$board[][] = $column;
                    }
                }
            }
        }

        public function printTable() { 
            $file = @file_get_contents(self::FILE_PATH);

            if (!empty($file)) { ?>
                <table>
                    <?php foreach (explode("\n", $file) as $row) { ?>
                        <tr>
                            <?php foreach (explode(",", $row) as $column) { ?>
                                <td><?= $column ?></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </table>
            <?php } else { ?>
                <table>
                    <?php foreach (self::$board as $row) { ?>
                        <tr>
                            <?php foreach ($row as $column) { ?>
                                <td><?= $column ?></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </table>
            <?php }
        }

        public function printForm() { ?>
            <form action="" method="POST">
                <label for="turno">Turno:</label>
                <select name="turno">
                    <?php foreach (self::TURNS as $symbol) { ?>
                        <option value="<?= $symbol ?>"><?= $symbol ?></option>
                    <?php } ?>
                </select>
                <br>
                <?php foreach (self::COORDS as $coord) { ?>
                    <label><?= $coord ?>:</label> <input type="text" name="<?= $coord ?>" value="<?= $_POST[$coord] ?>"><br>
                <?php } ?>
                <button type="submit" name="submit">Jugar</button>
            </form>
        <?php }

        public function placeTurn($turn, $x, $y) {
            $turn = strtoupper($turn);

            if ($turn == self::TURNS["CROSS"] || $turn == self::TURNS["CIRCLE"]) {
                $isXValid = $x >= 0 && $x < self::ROWS_COLUMNS;
                $isYValid = $y >= 0 && $y < self::ROWS_COLUMNS;
                
                if ($isXValid && $isYValid) {
                    if (self::$board[$x][$y] == "&nbsp;") {
                        self::$board[$x][$y] = $turn;

                        $file = file_put_contents(self::FILE_PATH, null);
                        
                        foreach (self::$board as $key1 => $row) {
                            foreach ($row as $key2 => $column) {
                                if ($key2 != array_key_last($row)) {
                                    $column .= ",";
                                }
                                
                                file_put_contents(self::FILE_PATH, $column, FILE_APPEND);
                            }
                            if ($key1 == array_key_last(self::$board)) {
                                file_put_contents(self::FILE_PATH, "\n", FILE_APPEND);
                            }
                        }
                    } else {
                        $errors[] = "Posición ocupada";
                    }
                } else {
                    $errors[] = "Posición inválida";
                }
            } else {
                $errors[] = "Turno inválido";
            }
        }

        public function getBoard() {
            return self::$board;
        }

        public function getErrors() {
            return self::$errors;
        }
    }
?>