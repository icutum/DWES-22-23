<?php
    namespace Form;

    abstract class Input {
        protected $type;
        protected $name;
        protected $placeholder;
        protected $data;
        protected $regex;
        protected static $errors = [];
        public static $inputs = [];

        public function __construct($name, $placeholder = null, $data = null, $regex = null) {
            $this->name = $name;
            $this->placeholder = $placeholder;
            $this->data = $data;
            $this->regex = $regex;
            self::$inputs[] = $this;
        }

        protected function cleanData(&$data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data, ENT_QUOTES, "UTF-8");
        }

        protected function validate() {
            self::cleanData($this->data);

            // Comprobación genérica
            if (empty($this->data)) {
                self::$errors[$this->name] = ucfirst($this->name) . " no puede estar vacío";
            }
        }

        abstract public function printInput();

        public static function printForm() {
            $fieldsets[] = array_slice(self::$inputs, 0, 4);
            $fieldsets[] = array_slice(self::$inputs, 4);

            foreach ($fieldsets as $key => $inputs) { ?>
                <fieldset class="form__fieldset">
                    <legend class="form__fieldset-title"><?= $key == 0 ? "Datos personales" : "Datos de la cuenta" ?></legend>

                    <?php foreach ($inputs as $input) {
                        $input->printInput();
                    } ?>
                </fieldset>
            <?php }
        }

        public function getType() {
            return $this->type;
        }

        public function getName() {
            return $this->name;
        }

        public function getPlaceholder() {
            return $this->placeholder;
        }

        public function getData() {
            return $this->data;
        }

        public function getRegex() {
            return $this->regex;
        }

        public static function getErrors() {
            return self::$errors;
        }
    }
?>