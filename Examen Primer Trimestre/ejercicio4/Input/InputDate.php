<?php
    namespace Input;

    use Utils\InputType, Utils\Regex;

    class InputDate extends Input {
        public function __construct($name, $value) {
            $this->type = InputType::DATE->value;
            $this->regex = Regex::DATE->value;
            parent::__construct($name, $value);
        }

        public function validate() {
            parent::validate();

            if (!preg_match($this->regex, $this->value)) {
                $this->error[] = $this->name . " no es correcto";
            }
        }

        public function printInput() { ?>
            <label class="form__label">
                <?= ucfirst($this->name) ?>:
                <input required class="form__input" type="<?= $this->type ?>" name="<?= $this->name ?>" value="<?= $this->value ?>">
                <?= parent::printErrors() ?>
            </label>
        <?php }
    }
?>