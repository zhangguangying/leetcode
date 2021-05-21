<?php

class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $n = count($prices);
        if ($n < 2) {
            return 0;
        }
        $dp[0][0] = 0;
        $dp[0][1] = -$prices[0];
        $dp[1][0] = 0;
        $dp[1][1] = max($dp[0][1], $dp[0][0] - $prices[1]);
        for ($i = 2; $i < $n; $i++) {
            $dp[$i][0] = max($dp[$i-1][0], $dp[$i-1][1] + $prices[$i]);
            $dp[$i][1] = max($dp[$i-1][1], $dp[$i-2][0] - $prices[$i]);
        }
        return $dp[$n-1][0];
    }
}