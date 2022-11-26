<?php
    namespace Input;

    use Utils\InputType, Utils\Regex;

    class InputRadio extends Input {
        private $options;

        public function __construct($name, $value, ...$options) {
            $this->type = InputType::MAIL;
            $this->regex = null;
            $this->options = $options;
            parent::__construct($name, $value);
        }

        public function printInput() {
            return true;
        }
    }
?>