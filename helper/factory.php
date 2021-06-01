<?php

class Factory
{
    public static function getMenus()
    {
        return json_decode(file_get_contents(__DIR__ . '/../data/menus.json'));
    }
}
