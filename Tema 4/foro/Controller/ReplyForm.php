<?php
    namespace Controller;

    class ReplyForm extends AForm {
        protected static $instance;
        protected $subject;

        public static function singleton() {
            if(!isset(self::$instance)) {
                self::$instance = @new ReplyForm();
            }
            return self::$instance;
        }

        public function createInputs($post) {
            @$this->subject = new \Input\Textarea("mensaje", $post["mensaje"], "Aquí va el mucho texto shur");
        }

        public function getSubject() {
            return $this->subject;
        }

        public function setSubject($subject) {
            $this->subject = $subject;
        }
    }
?>