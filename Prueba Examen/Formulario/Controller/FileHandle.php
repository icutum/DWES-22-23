<?php
    namespace Controller;

    class FileHandle {
        private static $instance;

        public static function singleton() {
            if(!isset(self::$instance)) {
                self::$instance = new FileHandle();
            }
            return self::$instance;
        }

        public function getCSV() {
            return @file_get_contents("./file.csv");
        }

        public function saveToCSV($form) {
            file_put_contents(
                "./file.csv",
                $form->getText()->getValue().",".
                password_hash($form->getPassword()->getValue(), PASSWORD_DEFAULT).",".
                $form->getNumber()->getValue().",".
                strtolower($form->getMail()->getValue()).",".
                $form->getDate()->getValue().",".
                implode(";", $form->getCheckbox()->getValue()).",".
                $form->getRadio()->getValue().",".
                $form->getSelect()->getValue().",".
                $form->getTextarea()->getValue()."\n",
                FILE_APPEND
            );
        }
    }
?>