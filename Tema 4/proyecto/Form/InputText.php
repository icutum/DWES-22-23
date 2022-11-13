<?php
    class InputText extends Input {
        private $minLength;
        private $maxLength;

        public function __construct($name, $placeholder = null, $data = null, $regex = "[a-zA-ZÀ-ÿ\s]", $minLength = 3, $maxLength = 25) {
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
        }
    }
?>