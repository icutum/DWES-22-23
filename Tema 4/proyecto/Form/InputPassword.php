<?php
    class InputPassword extends Input {
        private $minLength;
        private $maxLength;

        public function __construct($name, $placeholder = null, $data = null, $regex = "[\w]", $minLength = 8, $maxLength = 64) {
            parent::__construct($name, $placeholder, $data);
            $this->minLength = $minLength;
            $this->maxLength = $maxLength;
        }

        public function validate() {
            $fullRegex .= "{" . $this->minLength . "," . $this->maxLength . "}";

            parent::validate();

            // Comprobación específica
            if (!preg_match($fullRegex, $this->data)) {
                parent::$errors[$this->name] = ucfirst($this->name) . " tiene que tener de " . $this->minLength . " a " . $this->maxLength . " caracteres";
            }

            $this->data = password_hash($this->data, PASSWORD_DEFAULT);
        }
    }
?>