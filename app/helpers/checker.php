<?php
class Checker
{
    public static function checkName($name)
    {
        if (!preg_match('/^[aAeEiIoOuUàÀáÁâÂãÃäÄèÈéÉêÊëËìÌíÍîÎïÏòÒóÓôÔõÕöÖùÙúÚûÛüÜçÇA-Za-zA-Z]*$/u', $name)) {
            return true;
        } else{
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
}
