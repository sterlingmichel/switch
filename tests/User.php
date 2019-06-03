<?php

namespace App\tests;

use App\Utils;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{   //103.75/2.15
    public function getChange($totalCost, $amtProvided)
    {
        // load the class that handle the formula
        $calc = new Calculation();

        // perform the change calculation
        $result = $calc->createChange($totalCost, $amtProvided);

        // Define the expected results
        $rsExpect = json_encode(["100" => "1.60", "1" => "0.60", "0" => "0.00"]);

        // compare the result
        $this->assertEquals($rsExpect, $result);
    }
}
