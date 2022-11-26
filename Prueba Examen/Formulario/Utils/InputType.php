<?php
    namespace Utils;

    enum InputType: string {
        case TEXT = "text";
        case PASSWORD = "password";
        case NUMBER = "number";
        case RADIO = "radio";
        case CHECKBOX = "checkbox";
        case MAIL = "mail";
        case DATE = "date";
        case TEXTAREA = "textarea";
        case SELECT = "select";
    }
?>