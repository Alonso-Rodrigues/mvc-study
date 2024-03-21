<?php
class Checker
{
    //Email verification using regular expression
    public static function checkName($name)
    {
        if (!preg_match('/^[aAeEiIoOuUàÀáÁâÂãÃäÄèÈéÉêÊëËìÌíÍîÎïÏòÒóÓôÔõÕöÖùÙúÚûÛüÜçÇA-Za-zA-Z]*$/u', $name)) {
            return true;
        } else {
            return false;
        }
    }

    // Data verification and sanitization
    public static function checkEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    //Function to format the date
    public static function correctDate($date)
    {
        if (isset($date)) {
            return date('d/m/Y H:i', strtotime($date));
        } else {
            return false;
        }
    }
}
