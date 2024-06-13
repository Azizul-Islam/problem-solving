<?php
// Given a list of integers, find the minimum of their absolute values. 
$myData = "10 -12 34 12 -3 123";
$myArray = explode(" ", $myData);


function findMinValue($myArray)
{
    $minValue = $myArray[0];
    if (count($myArray) == 0) {
        echo "Empty Array!";
    }

    for ($i = 0; $i < count($myArray); $i++) {

        //If the element is negative, it converts it to its positive equivalent by multiplying it by -1.
        if ($myArray[$i] < 0) {
            $myArray[$i] = -1 * $myArray[$i];
        }


        if ($minValue > $myArray[$i]) {
            $minValue = $myArray[$i];
        }
    }

    echo "Sample output: $minValue";
}

findMinValue($myArray);
