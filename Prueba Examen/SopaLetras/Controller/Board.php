<?php
    namespace Controller;

    class Board {
        private $board;
        private $rows;
        private $columns;

        public function __construct($rows, $columns) {
            $this->board = [];
            $this->rows = $rows;
            $this->columns = $columns;

            self::loadBoard();
        }

        public function loadBoard() {
            for ($i = 0; $i < $this->rows; $i++) { 
                for ($j = 0; $j < $this->columns; $j++) { 
                    $this->board[$i][$j] = chr(rand(65, 90));
                }
            }
        }

        public function placeWord($word) {
            $word = strtoupper($word);

            $option = rand(0, 3);

            switch ($option) {
                case 0:
                    self::placeHorizontalWord($word);
                    break;

                case 1:
                    self::placeVerticalWord($word);
                    break;

                case 2:
                    self::placeHorizontalReverseWord($word);
                    break;

                case 3:
                    self::placeVerticalReverseWord($word);
                    break;
            }
        }

        public function printBoard() { ?>
            <table>
                <?php foreach ($this->board as $row) : ?>
                    <tr>
                        <?php foreach ($row as $column) : ?>
                            <td><?= $column ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php }

        private function placeHorizontalWord($word) {
            if (strlen($word) > $this->rows)
                return;

            $randomRow = rand(0, $this->rows - 1);
            $randomColumn = rand(0, $this->columns - strlen($word));

            self::iterateWordHorizontally($word, $randomRow, $randomColumn);
        }

        private function placeVerticalWord($word) {
            if (strlen($word) > $this->columns)
                return;

            $randomRow = rand(0, $this->rows - strlen($word));
            $randomColumn = rand(0, $this->columns - 1);

            self::iterateWordVertically($word, $randomRow, $randomColumn);
        }

        private function placeHorizontalReverseWord($word) {
            if (strlen($word) > $this->rows)
                return;

            $randomRow = rand(0, $this->rows - 1);
            $randomColumn = rand(0, $this->columns - strlen($word));

            self::iterateWordHorizontally(strrev($word), $randomRow, $randomColumn);
        }

        private function placeVerticalReverseWord($word) {
            if (strlen($word) > $this->columns)
                return;

            $randomRow = rand(0, $this->rows - strlen($word));
            $randomColumn = rand(0, $this->columns - 1);

            self::iterateWordVertically(strrev($word), $randomRow, $randomColumn);
        }

        private function iterateWordHorizontally($word, $row, $column) {
            $offset = $column + strlen($word);

            $index = 0;
            for ($column; $column < $offset; $column++) { 
                $this->board[$row][$column] = $word[$index];

                $index++;
            }
        }

        private function iterateWordVertically($word, $row, $column) {
            $offset = $row + strlen($word);

            $index = 0;
            for ($row; $row < $offset; $row++) {
                $this->board[$row][$column] = $word[$index];

                $index++;
            }
        }
    }
?>