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
                self::$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$link->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            } catch (PDOException $e) {
                die('Unable to connect with the database');
            }
        }
        return self::$link;
    }
}
