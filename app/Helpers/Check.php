<?php

class Check {

    public static function checkName($name)
    {
        if (!preg_match('/[a-zA-Z]+/m', $name)) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    public static function dateBr($date) {
        if (isset($date)) {
            return date('d/m/Y H:i', strtotime($date));
        } else {
            return false;
        }
    }

}