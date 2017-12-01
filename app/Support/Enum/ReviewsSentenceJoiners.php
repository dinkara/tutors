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
    const EVEN = "even";
    const HOWEVER = "however";
    const ADDITIONALLY = "additionally";

    
    public static function all() {
        return [
            self::AND,
            self::BUT,
            self::EVEN,
            self::HOWEVER,
            self::ADDITIONALLY,

        ];
    }
    
    public static function stringify(){
        return implode(",", self::all());
    }
}
