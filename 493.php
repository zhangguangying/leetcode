<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function reversePairs($nums) {
        return $this->mergeSort($nums, 0, count($nums)-1);
    }

    function mergeSort(&$nums, $left, $right) {
        if ($right <= $left) {
            return 0;
        }
        $mid = ($left + $right) >> 1;
        $cnt = $this->mergeSort($nums, $left, $mid) + $this->mergeSort($nums, $mid + 1, $right);
        for ($i = $left, $j = $mid + 1; $i <= $mid; $i++) {
            while ($j <= $right && $nums[$i] > 2 * $nums[$j]) {
                $j++;
            }
            $cnt += $j - $mid - 1;
        }

        $temp = [];
        $i = $left;
        $j = $mid + 1;
        $k = 0;
        while ($i <= $mid && $j <= $right) {
            $temp[$k++] = $nums[$i] < $nums[$j] ? $nums[$i++] : $nums[$j++];
        }
        while ($i <= $mid) {
            $temp[$k++] = $nums[$i++];
        }
        while ($j <= $right) {
            $temp[$k++] = $nums[$j++];
        }
        for ($k = 0; $k < count($temp); $k++) {
            $nums[$left+$k] = $temp[$k];
        }
        return $cnt;
    }
}