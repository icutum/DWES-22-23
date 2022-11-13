<?php
    namespace Form;

    class Input {
        private $type;
        private $name;
        private $placeholder;
        private $data;
        private $regex;
        protected static $errors = [];
        protected static $inputs = [];

        public function __construct($name, $placeholder = null, $data = null, $regex = null) {
            $this->name = $name;
            $this->placeholder = $placeholder;
            $this->data = $data;
            $this->regex = $regex;
        }
        
        public function getErrors() {
            return $this->errors;
        }
        
        protected function cleanData(&$data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data, ENT_QUOTES, "UTF-8");
        }

        protected function validate() {
            cleanData($this->data);

            // Comprobación genérica
            if (!empty($this->data)) {
                self::$errors[$this->name] = ucfirst($this->name) . " no puede estar vacío";
            }
        }
    }
?>