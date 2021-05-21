<?php

class Solution {

    /**
     * @param Integer $k
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($k, $prices) {
        $n = count($prices);
        if ($n < 2) {
            return 0;
        }
        $dp = [];
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j <= $k; $j++) {
                if ($i - 1 < 0 || $j - 1 < 0) {
                    $dp[$i][$j][0] = 0;
                    $dp[$i][$j][1] = -$prices[$i];
                    continue;
                }
                $dp[$i][$j][0] = max($dp[$i-1][$j][0], $dp[$i-1][$j][1]+$prices[$i]);
                $dp[$i][$j][1] = max($dp[$i-1][$j][1], $dp[$i-1][$j-1][0] - $prices[$i]);
            }
        }
        return $dp[$n-1][$k][0];
    }
}