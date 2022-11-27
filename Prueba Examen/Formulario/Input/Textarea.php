<?php
    namespace Input;

    use Utils\Placeholder, Utils\InputType, Utils\Regex;

    class Textarea extends Input {
        public function __construct($name, $value, $placeholder = null) {
            $this->type = InputType::TEXTAREA->value;
            $this->regex = null;
            $this->placeholder = $placeholder;
            parent::__construct($name, $value);
        }

        public function validate() {
            parent::validate();
        }

        public function printInput() { ?>
            <label class="form__label">
                <?= ucfirst($this->name) ?>:
                <textarea required class="form__input" name="<?= $this->name ?>" placeholder="<?= $this->placeholder ?>"><?= $this->value ?></textarea>
                <?= parent::printErrors() ?>
            </label>
        <?php }
    }
?>