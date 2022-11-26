<?php
    namespace Utils;

    enum Regex: string {
        case TEXT = "/^[a-zA-ZÀ-ÿ\s]{3, 25}$/";
        case PASSWORD = "/^[\w]{8,64}$/";
        case NUMBER = "/^[0-9]{1,}$/";
        case MAIL = "/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/";
        case DATE = "/^(19[0-9]{2}|2[0-9]{3})-(0[1-9]|1[12])-(0[1-9]|[12][0-9]|3[0-1])$/";
    }
?>