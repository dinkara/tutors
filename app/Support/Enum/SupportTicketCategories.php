<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Support\Enum;

/**
 * Description of SupportTicketCategories
 *
 * @author Dinkic
 */
class SupportTicketCategories {
    
    const BUG = "bug";
    const IMPROVEMENT = "improvement";
    const OTHER = "other";

    
    public static function all() {
        return [
            self::BUG,
            self::IMPROVEMENT,
            self::OTHER,

        ];
    }
    
    public static function stringify(){
        return implode(",", self::all());
    }
}
