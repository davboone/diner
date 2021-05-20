<?php

// data-layer.php
// Return data for the diner app

// Get the meals for the order form
function getMeals()
{
    return array("breakfast","brunch","lunch","dinner");
}

/*
 * 1. Help each other
 * 2. Add a getCondiments() function to the model
 * 3. Modify your Controller to get the condiments
 *    from the Model and send them to the View
 * 4. LModify the View page to display the conds
 */

function getCondiments()
{
    return array('ketchup','mustard','sriracha');
}