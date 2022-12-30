<?php
    namespace Input;

    use Utils\InputType, Utils\Regex;

    class Select extends Input {
        private $options;

        public function __construct($name, $value, ...$options) {
            $this->type = InputType::SELECT->value;
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
                <select class="form__input" name="<?= $this->name ?>">
                    <?php foreach ($this->options as $option) : ?>
                        <option value="<?=$option?>" <?= ($this->value == $option) ? "selected" : ""; ?> ><?= $option ?></option>
                    <?php endforeach; ?>
                </select>
                <?= parent::printErrors() ?>
            </label>
        <?php }
    }
?>