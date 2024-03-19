<?php

class session
{
    public static function message($name, $texte = null, $class = null)
    {
        if (!empty($name)) {
            if (!empty($texte) && empty($_SESSION[$name])) {
                if (!empty($_SESSION[$name])) {
                    unset($_SESSION[$name]);
                }
                $_SESSION[$name] = $texte;
                $_SESSION[$name . 'class'] = $class;
            } elseif (!empty($_SESSION[$name]) && empty($texte)) {
                $class = !empty($_SESSION[$name . 'class']) ? $_SESSION[$name . 'class'] : 'alert alert-success';
                echo '<div class="' . $class . '">' . $_SESSION[$name] . '</div>';

                unset($_SESSION[$name]);
                unset($_SESSION[$name . 'class']);
            }
        }
    }
}
