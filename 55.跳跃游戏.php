<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canJump($nums) {
        $endPoint = count($nums) - 1;
        for ($i = $endPoint; $i >= 0; $i--) {
            if ($nums[$i] + $i >= $endPoint) {
                $endPoint = $i;
            }
        }
        return $endPoint == 0;
    }
}