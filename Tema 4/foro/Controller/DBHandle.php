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

        public function insertUser($form) {
            $sth = self::$instance->prepare(
                "INSERT INTO users (user, mail, password)
                VALUES (:user, :mail, :password)"
            );

            $sth->execute([
                ":user" => $form->getUser()->getValue(),
                ":mail" => $form->getMail()->getValue(),
                ":password" => password_hash($form->getPassword()->getValue(), PASSWORD_DEFAULT)
            ]);
        }

        public function isUserValid($form) {
            $sth = self::$instance->prepare(
                "SELECT password FROM users WHERE user = :user"
            );

            $sth->execute([":user" => $form->getUser()->getValue()]);

            $row = $sth->fetch();

            return @password_verify($form->getPassword()->getValue(), $row["password"]);
        }

        public function isUserAvailable($form) {
            $sth = self::$instance->prepare(
                "SELECT * FROM users WHERE user = :user OR mail = :mail"
            );

            $sth->execute([
                ":user" => $form->getUser()->getValue(),
                ":mail" => $form->getMail()->getValue()
            ]);

            $row = $sth->fetch();

            return empty($row);
        }

        public static function getInstance() {
            return self::$instance;
        }
    }
?>