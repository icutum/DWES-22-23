<?php
    namespace Controller;

    class DBHandle {
        private static $instance;

        public static function connect($dsn, $user, $password, $options) {
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
            $sth = self::$instance->prepare("INSERT INTO prueba VALUES (:text, :password, :number, :mail, :date, :checkbox, :radio, :selected, :textarea)");
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
    }
?>