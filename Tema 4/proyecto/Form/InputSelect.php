<?php
    namespace Form;

    class InputSelect extends Input {
        private $list = [];
        
        public function __construct($name, $data = null, string ...$list){
            $this->type="select";
            foreach ($list as $item) {
                $this->list[] = $item;
            }
            parent::__construct($name, null, $data, null);
        }

        public function validate() {
            // Comprobación específica
            if (!in_array($this->data, $this->list)) {
                parent::$errors[$this->name] = ucfirst($this->name) . " inválido";
            }
        }

        public function printInput() { ?>
            <label class="form__label">
                <?= ucfirst($this->name) ?>:
                <select class="form__input" name="<?= $this->name ?>">
                    <?php foreach ($this->list as $item) : ?>
                        <option value="<?=$item?>" <?= ($this->data == $item) ? "selected" : ""; ?> ><?=$item?></option>
                    <?php endforeach; ?>
                </select>
            </label>
        <?php }
    }
?>