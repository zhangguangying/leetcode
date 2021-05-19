<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums) {
        $dp = $nums;
        for ($i = 1; $i < count($nums); $i++) {
            $dp[$i] = max($nums[$i], $dp[$i-1]+$nums[$i]);
        }
        return max($dp);
    }
}