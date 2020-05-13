<?php

if (! function_exists('mathAdd')) {
    /**
     * Simple addition value function.
     *
     * @param  double $valueA
     * @param  double $valueB
     * @return double
     */
    function mathAdd($valueA, $valueB)
    {
        return $valueA + $valueB;
    }
}

if (! function_exists('mathSubtract')) {
    /**
     * Simple subtraction value function.
     *
     * @param  double $valueA
     * @param  double $valueB
     * @return double
     */
    function mathSubtract($valueA, $valueB)
    {
        return $valueA - $valueB;
    }
}
