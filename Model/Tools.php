<?php
/**
 * Created by PhpStorm.
 * User: kamhyh
 * Date: 19.12.2014
 * Time: 21:28
 */

class Tools {
    public static function depth($str)
    {
        return substr_count($str, '/') - 2;
    }
}