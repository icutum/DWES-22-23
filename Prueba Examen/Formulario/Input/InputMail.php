<?php
    namespace Input;

    use Utils\Placeholder, Utils\InputType, Utils\Regex;

    class InputMail extends Input {
        public function __construct($name, $value) {
            $this->type = InputType::MAIL;
            $this->regex = Regex::MAIL;
            parent::__construct($name, $value);
        }

        public function validate() {
            parent::validate();

            if (!preg_match($this->regex, $this->value)) {
                $this->error = $this->name . " no es correcto";
            }
        }

        public function printInput() {
            return true;
        }
    }
?>