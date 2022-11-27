<?php
    namespace Form;

    class FileHandle {
        public static function singleton() {
            if(!isset(self::$instance)) {
                self::$instance = new StudentManager();
            }
            return self::$instance;
        }
    }
?>