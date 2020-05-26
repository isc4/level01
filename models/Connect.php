<?php

class Connect
{
    public static function db()
    {
        //1 Подключиться к базе данных
        return new PDO("mysql:host=localhost; dbname=learn; charset=utf8;","root", "secret");
    }
}