<?php
    namespace Input;

    use Utils\InputType, Utils\Regex;

    class InputCheckbox extends Input {
        private $options;

        public function __construct($name, $value, ...$options) {
            $this->type = InputType::CHECKBOX->value;
            $this->regex = null;
            $this->options = $options;
            parent::__construct($name, $value);
        }

        public function validate() {
            if (isset($this->value)) {
                foreach ($this->value as $v) {
                    if (!in_array($v, $this->options)) {
                        $this->error[] = $this->name . " no es correcto";
                    }
                }
            } else {
                $this->error[] = "Elige al menos un valor";
            }
        }

        public function printInput() { ?>
            <label class="form__label">
                <?= ucfirst($this->name) ?>:
                <div class="form__check">
                    <?php foreach ($this->options as $option) : ?>
                        <label class="form__label">
                            <input class="form__input form__input--check" type="<?= $this->type ?>" name="<?= $this->name ?>[]" value="<?= $option ?>" <?= (in_array($option, ($this->value == null) ? [] : $this->value)) ? "checked" : ""; ?> > <?= $option ?>
                        </label>
                    <?php endforeach; ?>
                </div>
                <?= parent::printErrors() ?>
            </label>
        <?php }
    }
?>