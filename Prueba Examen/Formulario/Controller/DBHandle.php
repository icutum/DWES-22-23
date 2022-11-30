<?php
    namespace Controller;

    class DBHandle {
        private static $instance;

        public function __construct($dsn, $user, $password, $options) {
            if (!isset(self::$instance)) {
                try {
                    self::$instance = new \PDO($dsn, $user, $password, $options);

                } catch (PDOException $e) {
                    print "Error:" . $e->getMessage() . "\n";
                    exit();
                }
            }
        }

        public function insertValues($form) {
            $sth = self::$instance->prepare(
                "INSERT INTO prueba (text, password, number, mail, date, checkbox, radio, selected, textarea)
                VALUES (:text, :password, :number, :mail, :date, :checkbox, :radio, :selected, :textarea)"
            );

            $sth->execute([
                ":text" => $form->getText()->getValue(),
                ":password" => password_hash($form->getPassword()->getValue(), PASSWORD_DEFAULT),
                ":number" => $form->getNumber()->getValue(),
                ":mail" => $form->getMail()->getValue(),
                ":date" => $form->getDate()->getValue(),
                ":checkbox" => implode(";", $form->getCheckbox()->getValue()),
                ":radio" => $form->getRadio()->getValue(),
                ":selected" => $form->getSelect()->getValue(),
                ":textarea" => $form->getTextarea()->getValue()
            ]);
        }

        public function selectAll() {
            $sth = self::$instance->prepare("SELECT * FROM prueba");
            $sth->execute();

            return $sth->fetchAll();
        }

        public function selectSearchBar($field) {
            if (isset($field)) {
                $sth = self::$instance->prepare('SELECT * FROM prueba WHERE text LIKE CONCAT("%", :text, "%")');
                $sth->execute([":text" => $field]);
            } else {
                return self::selectAll();
            }

            return $sth->fetchAll();
        }

        public function deleteRows($post) {
            $sth = self::$instance->prepare(
                sprintf("DELETE FROM prueba WHERE id IN (%s)",
                implode(",", array_fill(0, count($post), "?")))
            );

            $sth->execute($post);
        }

        public function printTable($sth) { ?>
            <form action="" method="get">
                <label for="">
                    <input type="text" name="text" value="<?= $_GET["text"] ?>" placeholder="Filtrar por text...">
                    <input type="submit" name="search" value="Buscar">
                </label>
            </form>
            <form action="" method="post">
                <?php if ($_GET["delete-success"]) : ?>
                    <p class="form__success">Se ha borrado correctamente</p>
                <?php endif; ?>

                <table>
                    <caption>Lista Bases</caption>
                    <tr>
                        <th><!--Vacío--></th>
                        <?php foreach ($sth[0] as $key => $value) : ?>
                            <th><?= $key ?></th>
                        <?php endforeach; ?>
                    </tr>
                    <?php foreach ($sth as $row) : ?>
                        <tr>
                            <?php foreach ($row as $column => $value) : 
                                if ($column == "id") : ?>
                                    <td><input type="checkbox" name="<?= $column ?>[]" value="<?= $value ?>"></td>
                                    <td><?= $value ?></td>
                                <?php else : ?>
                                    <td><?= $value ?></td>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <input type="submit" name="delete" value="Borrar">
            </form>
        <?php }

        public static function getInstance() {
            return self::$instance;
        }
    }
?>