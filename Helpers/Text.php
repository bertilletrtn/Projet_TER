<?php
namespace App\Helpers;

class Test {
    public static function exerpt(string $chaine, int $limit = 30)
    {
        if(strlen($chaine) <= $limit){
            return $chaine;
        }
        return substr($chaine, 0, $limit) . '...';
    }
}