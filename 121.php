<?php

class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $n = count($prices);
        $dp = [];
        $dp[0][0] = 0;
        $dp[0][1] = -$prices[0];
        for ($i = 1; $i < $n; $i++) {
            $dp[$i][0] = max($dp[$i-1][0], $dp[$i-1][1] + $prices[$i]);
            $dp[$i][1] = max($dp[$i-1][1], -$prices[$i]);
        }
        return $dp[$n-1][0];
    }
}