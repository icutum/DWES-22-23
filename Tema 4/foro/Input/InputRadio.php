<?php
    namespace Input;

    use Utils\InputType, Utils\Regex;

    class InputRadio extends Input {
        private $options;

        public function __construct($name, $value, ...$options) {
            $this->type = InputType::RADIO->value;
            $this->regex = null;
            $this->options = $options;
            parent::__construct($name, $value);
        }

        public function validate() {
            if (!in_array($this->value, $this->options)) {
                $this->error[] = $this->name . " no es correcto";
            }
        }

        public function printInput() { ?>
            <label class="form__label">
                <?= ucfirst($this->name) ?>:
                <div class="form__check">
                    <?php foreach ($this->options as $option) : ?>
                        <label class="form__label">
                            <input class="form__input form__input--check" type="<?= $this->type ?>" name="<?= $this->name ?>" value="<?= $option ?>" <?= ($option == $this->value) ? "checked" : ""; ?> > <?= $option ?>
                        </label>
                    <?php endforeach; ?>
                </div>
                <?= parent::printErrors() ?>
            </label>
        <?php }
    }
?>