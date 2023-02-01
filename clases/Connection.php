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
            try {
                self::$link = new PDO(
                    'mysql:host=localhost;dbname=ecommercephp',
                    'root',
                    ''
                );
            } catch (PDOException $e) {
                die('Unable to connect with the database');
            }
        }
        return self::$link;
    }
}
