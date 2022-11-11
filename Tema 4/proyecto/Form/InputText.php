<?php
    class InputText extends Input {
        private $minLength;
        private $maxLength;

        public function __construct($type, $name, $minLength, $maxLength) {
            parent::__construct($type, $name);
            $this->minLength = $minLength;
            $this->maxLength = $maxLength;
        }

        public function validate($data) {
            $regex = "/^[a-zA-ZÀ-ÿ\s]{" . $this->minLength . "," . $this->maxLength . "}$/";

            $data = cleanData($data);

            // Comprobación específica
        }
    }
?>