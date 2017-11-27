<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Support\Enum;

/**
 * Description of ReviewsSentenceJoiners
 *
 * @author Dinkic
 */
class ReviewsSentenceJoiners {
    
    const AND = "and";
    const BUT = "but";

    
    public static function all() {
        return [
            self::AND,
            self::BUT,

        ];
    }
    
    public static function stringify(){
        return implode(",", self::all());
    }
}
