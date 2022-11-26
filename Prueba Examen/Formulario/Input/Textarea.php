<?php
    namespace Input;

    use Utils\InputType, Utils\Regex;

    class Textarea extends Input {
        public function __construct($name, $value) {
            $this->type = InputType::MAIL;
            $this->regex = null;
            parent::__construct($name, $value);
        }

        public function printInput() {
            return true;
        }
    }
?>