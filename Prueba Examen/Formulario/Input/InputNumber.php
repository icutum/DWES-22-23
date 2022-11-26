<?php
    namespace Input;

    use Utils\Placeholder, Utils\InputType, Utils\Regex;

    class InputNumber extends Input {
        private $min;
        private $max;

        public function __construct($name, $value, $min, $max) {
            $this->type = InputType::NUMBER;
            $this->regex = Regex::NUMBER;
            $this->min = $min;
            $this->max = $max;
            parent::__construct($name, $value);
        }

        public function validate() {
            parent::validate();

            if (!preg_match($this->regex, $this->value)) {
                if ($this->value < $this->min || $this->value > $this->max) {
                    $this->error = $this->name . " no está comprendido entre los valores " . $this->min . " y " . $this->max;
                }
                $this->error = $this->name . " no es correcto";
            }
        }

        public function printInput() {
            return true;
        }
    }
?>