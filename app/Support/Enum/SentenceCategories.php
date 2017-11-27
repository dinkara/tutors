<?php

namespace App\Support\Enum;

class SentenceCategories
{
    const IMPRESSION = 'impression ';
    const PARTICIPATION = 'participation';
    const ATTITUDE = 'attitude';
    const VOCABULARY = 'vocabulary';
    const SPEAKING = 'speaking';
    const READING = 'reading';
    const CONCLUSION = 'conclusion';
    
    public static function all(){
        return [
            self::IMPRESSION,
            self::PARTICIPATION,
            self::ATTITUDE,
            self::VOCABULARY,
            self::SPEAKING,
            self::READING,
            self::CONCLUSION            
        ];
    }
    
    public static function stringify(){
        return implode(",", self::all());
    }
}