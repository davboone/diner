<?php

/*
 *
 */

//Return true if a food is valid
function validFood($food)
{
    return strlen(trim($food)) >= 2;
}

//Return true if meal is valid
function validMeal($meal)
{
    return in_array($meal, getMeals());
}

//Return true if conds is valid
function validCond($cond)
{
    $validCondiments = getCondiments();
    foreach ($cond as $userChoice) {
        if(!in_array($userChoice, $validCondiments)) {
            return false;
        }
    }

    //All choices are valid
    return true;
}