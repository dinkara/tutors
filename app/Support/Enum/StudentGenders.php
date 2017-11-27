<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Support\Enum;

/**
 * Description of StudentGenders
 *
 * @author Dinkic
 */
class StudentGenders {
    
    const MALE = "male";
    const FEMALE = "female";

    
    public static function all() {
        return [
            self::MALE,
            self::FEMALE,

        ];
    }
    
    public static function stringify(){
        return implode(",", self::all());
    }
}
