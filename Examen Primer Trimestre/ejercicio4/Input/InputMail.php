<?php
    namespace Input;

    use Utils\Placeholder, Utils\InputType, Utils\Regex;

    class InputMail extends Input {
        public function __construct($name, $value, $placeholder = null) {
            $this->type = InputType::MAIL->value;
            $this->regex = Regex::MAIL->value;
            $this->placeholder = $placeholder;
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
                <input required class="form__input" type="<?= $this->type ?>" name="<?= $this->name ?>" value="<?= $this->value ?>" placeholder="<?= $this->placeholder ?>">
                <?= parent::printErrors() ?>
            </label>
        <?php }
    }
?>