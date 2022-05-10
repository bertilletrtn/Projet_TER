<?php

class Text {
    public static function excerpt(string $chaine, int $limit = 25)
    {
        if(mb_strlen($chaine) <= $limit){
            return $chaine;
        }
        $dernierespace = mb_strpos($chaine, ' ', $limit);
        return mb_substr($chaine, 0, $dernierespace) . '...';
    }
}