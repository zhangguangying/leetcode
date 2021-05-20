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
        return max($this->robSub($nums, 0, $n-2), $this->robSub($nums, 1, $n-1));
    }

    function robSub(&$nums, $i, $j)
    {
        $dp = [];
        $dp[$i][0] = 0;
        $dp[$i][1] = $nums[$i];
        $i++;
        for (; $i <= $j; $i++) {
            $dp[$i][0] = max($dp[$i-1][0], $dp[$i-1][1]);
            $dp[$i][1] = $dp[$i-1][0]+$nums[$i];
        }
        return max($dp[$i-1][0], $dp[$i-1][1]);
    }
}