<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxProduct($nums) {
        $maxF = $nums;
        $minF = $nums;
        for ($i = 1; $i < count($nums); $i++) {
            $maxF[$i] = max($nums[$i], $maxF[$i-1]*$nums[$i], $minF[$i-1]*$nums[$i]);
            $minF[$i] = min($nums[$i], $maxF[$i-1]*$nums[$i], $minF[$i-1]*$nums[$i]);
        }
        return max($maxF);
    }
}