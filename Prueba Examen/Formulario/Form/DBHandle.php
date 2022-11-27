<?php
    class DBHandle {
        private static $instance;

        public static function connect($dsn, $user, $password, $options) {
            if (!isset(self::$instance)) {
                try {
                    self::$instance = new PDO($dsn, $user, $password, $options);

                    return self::$instance;
                } catch (PDOException $e) {
                    print "Error:" . $e->getMessage() . "\n";
                    die();
                }
            }
        }
    }
?>