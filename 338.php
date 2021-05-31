<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer[]
     */
    function countBits($n) {
        $bits[0] = 0;
        $highBit = 0;
        for ($i = 1; $i <= $n; $i++) {
            if (($n & ($n-1)) == 0) {
                $highBit = $i;
            }
            $bits[$i] = $bits[$i-$highBit] + 1;
        }
        return $bits;
    }
}