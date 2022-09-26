<?php

class Url {

    public static function redirection($url) {

        header("Location:".URL.DIRECTORY_SEPARATOR.$url);

    }

}