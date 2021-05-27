<?php

/*
 *
 */

class Validation
{
//Return true if a food is valid
    static function validFood($food)
    {
        return strlen(trim($food)) >= 2;
    }

//Return true if meal is valid
    static function validMeal($meal)
    {
        return in_array($meal, DataLayer::getMeals());
    }

//Return true if conds is valid
    static function validCond($cond)
    {
        $validCondiments = DataLayer::getCondiments();
        foreach ($cond as $userChoice) {
            if (!in_array($userChoice, $validCondiments)) {
                return false;
            }
        }

        //All choices are valid
        return true;
    }
}