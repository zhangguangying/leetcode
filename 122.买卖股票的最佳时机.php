<?php
class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $buy = $sell = $profit = 0;
        $i = 0;
        $n = count($prices) - 1;
        while ($i < $n) {
            while ($i < $n && $prices[$i + 1] <= $prices[$i]) $i++;
            $buy = $prices[$i];

            while ($i < $n && $prices[$i + 1] > $prices[$i]) $i++;
            $sell = $prices[$i];

            $profit += $sell - $buy;
        }
        return $profit;
    }
}