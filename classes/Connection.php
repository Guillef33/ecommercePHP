<?php

class Connection
{
    static $link;

    private function __construct()
    {
    } //impedimos instanciar la clase

    static function conectar()
    {
        if (!isset(self::$link)) {
            self::$link = new PDO(
                'mysql:host=localhost;dbname=ecommercePHP',
                'root',
                ''
            );
        }
        return self::$link;
    }
}
