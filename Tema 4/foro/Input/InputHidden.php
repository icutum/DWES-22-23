<?php
    namespace Input;

    use Utils\InputType;

    class InputHidden extends Input {
        public function __construct($name, $value) {
            $this->type = InputType::HIDDEN->value;
            parent::__construct($name, $value);
        }

        public function validate() {
            parent::validate();
        }

        public function printInput() { ?>
            <label class="form__label">
                <input required class="form__input" type="<?= $this->type ?>" name="<?= $this->name ?>" value="<?= $this->value ?>">
                <?= parent::printErrors() ?>
            </label>
        <?php }
    }
?>