<?php
    namespace Form;

    class InputPassword extends Input {
        private $minLength;
        private $maxLength;

        public function __construct($name, $placeholder = null, $data = null, $regex = "[\w]", $minLength = 8, $maxLength = 64) {
            $this->type = "password";
            $this->minLength = $minLength;
            $this->maxLength = $maxLength;
            parent::__construct($name, $placeholder, $data, $regex);
        }

        public function validate() {
            parent::validate();

            // Comprobación específica
            $fullRegex = "/" . $this->regex . "{" . $this->minLength . "," . $this->maxLength . "}/";

            if (!preg_match($fullRegex, $this->data)) {
                parent::$errors[$this->name] = ucfirst($this->name) . " tiene que tener de " . $this->minLength . " a " . $this->maxLength . " caracteres";
            }
        }

        public function printInput() { ?>
            <label class="form__label">
                <?= ucfirst($this->name) ?>:
                <input required class="form__input" type="<?= $this->type ?>" name="<?= $this->name ?>" value="<?= $this->data ?>" placeholder="<?= $this->placeholder ?>">
            </label>
        <?php }
    }
?>