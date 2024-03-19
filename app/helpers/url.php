<?php

class Url
{
    public static function redirect($url)
    {
        header('Location:' . url . DIRECTORY_SEPARATOR . $url);
    }
}
