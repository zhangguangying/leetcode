<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function jump($nums) {
        $jumps = $curEnd = $curFarthest = 0;
        for ($i = 0; $i < count($nums) - 1; $i++) {
            $curFarthest = max($curFarthest, $nums[$i] + $i);
            if ($i == $curEnd) {
                $jumps++;
                $curEnd = $curFarthest;
            }
        }
        return $jumps;
    }
}
