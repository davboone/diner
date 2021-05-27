<?php

// data-layer.php
// Return data for the diner app

class DataLayer
{
    //Add a field for the database object
    private $_dbh;

    //Define a constructor
    function __construct($dbh)
    {
        $this->_dbh = $dbh;
    }

    //Saves an order to the database
    function saveOrder()
    {
        //1. Define the query
        $sql = "INSERT INTO orders (food, meal, condiments)
                VALUES (:food, :meal, :condiments)";

        //2. Prepare the statement (precompile the query)
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $statement->bindParam(':food', $_SESSION['order']->getFood(), PDO::PARAM_STR);
        $statement->bindParam(':meal', $_SESSION['order']->getMeal(), PDO::PARAM_STR);
        $statement->bindParam(':condiments', $_SESSION['order']->getCondiments(), PDO::PARAM_STR);

        //4. Execute the query
        $statement->execute();

        //5. Process the results (get OrderID)
        $id = $this->_dbh->lastInsertId();
        return $id;
    }

    // Get the meals for the order form
    static function getMeals()
    {
        return array("breakfast", "brunch", "lunch", "dinner");
    }

    /*
     * 1. Help each other
     * 2. Add a getCondiments() function to the model
     * 3. Modify your Controller to get the condiments
     *    from the Model and send them to the View
     * 4. LModify the View page to display the conds
     */

    static function getCondiments()
    {
        return array('ketchup', 'mustard', 'sriracha');
    }
}