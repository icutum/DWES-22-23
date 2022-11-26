<?php
    namespace Utils;

    trait Placeholder {
        private $placeholder;

        public function getPlaceholder() {
            return $this->placeholder;
        }

        public function setPlaceholder($placeholder) {
            $this->placeholder = $placeholder;
        }
    }
?>