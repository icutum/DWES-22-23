<?php
    namespace Controller;

    class PostForm extends AForm {
        protected static $instance;
        protected $title;
        protected $subject;

        public static function singleton() {
            if(!isset(self::$instance)) {
                self::$instance = @new PostForm();
            }
            return self::$instance;
        }

        public function createInputs($post) {
            @$this->title = new \Input\InputText("titulo", $post["titulo"], "Título de la publicación");
            @$this->subject = new \Input\Textarea("mensaje", $post["mensaje"], "Aquí va el mucho texto shur");
        }

        public function getTitle() {
            return $this->title;
        }

        public function setTitle($title) {
            $this->title = $title;
        }

        public function getSubject() {
            return $this->subject;
        }

        public function setSubject($subject) {
            $this->subject = $subject;
        }

        public function getRedirect() {
            return $this->redirect;
        }

        public function setRedirect($redirect) {
            $this->redirect = $redirect;
        }
    }
?>