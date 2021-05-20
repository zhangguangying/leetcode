<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function rob($nums) {
        $n = count($nums);
        if ($n == 1) {
            return $nums[0];
        }
        if ($n == 2) {
            return max($nums);
        }
        $dp = [];
        $dp[0][0] = 0;
        $dp[0][1] = $nums[0];
        for ($i = 1; $i < $n; $i++) {
            $dp[$i][0] = max($dp[$i-1][0], $dp[$i-1][1]);
            $dp[$i][1] = $dp[$i-1][0]+$nums[$i];
        }
        return max($dp[$n-1][0], $dp[$n-1][1]);
    }
}