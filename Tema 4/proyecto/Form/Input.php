<?php
    namespace Form;

    class Input {
        private $type;
        private $name;
        private $data;
        private $regex;
        protected static $errors = [];

        public function __construct($type, $name, $data = null, $regex = null) {
            $this->type = $type;
            $this->name = $name;
            $this->data = $data;
            $this->regex = $regex;
        }
        
        public function getErrors() {
            return $this->errors;
        }
        
        protected function cleanData($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data, ENT_QUOTES, "UTF-8");

            return $data;
        }

        protected function validate() {
            $this->data = cleanData($this->data);

            // Comprobación genérica
            if (!empty($data)) {
                self::$errors[$name] = ucfirst($name) . " no puede estar vacío";
            }
        }
    }
?>