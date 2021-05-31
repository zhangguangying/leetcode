<?php

class Solution {
    /**
     * @param Integer $n
     * @return Integer
     */
    function reverseBits($n) {
        $rev = 0;
        for ($i = 0; $i < 32 && $n > 0; $i++) {
            $rev |= ($n & 1) << (31 - $i);
            $n = $n >> 1;
        }
        return $rev;
    }
}