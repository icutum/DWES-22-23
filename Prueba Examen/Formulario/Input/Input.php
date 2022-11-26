<?php
    namespace Input;

    use Utils\InputType;

    abstract class Input {
        protected $type;
        protected $name;
        protected $value;
        protected $regex;
        protected $error;

        protected function __construct($name, $value) {
            $this->name = $name;
            $this->value = $value;
        }

        protected function cleanData(&$data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data, ENT_QUOTES, "UTF-8");
        }

        protected function validate() {
            self::cleanData($this->value);

            if (empty($this->value)) {
                $this->error = $this->name . " no puede estar vacío";
            }
        }

        public abstract function printInput();

        public function getType() {
            return $this->type->value;
        }

        public function setType($type) {
            $this->type = $type;
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getValue() {
            return $this->value;
        }

        public function setValue($value) {
            $this->value = $value;
        }

        public function getRegex() {
            return $this->regex->value;
        }

        public function setRegex($regex) {
            $this->regex = $regex;
        }

        public function getError() {
            return $this->error;
        }

        public function setError($error) {
            $this->error = $error;
        }
    }
?>