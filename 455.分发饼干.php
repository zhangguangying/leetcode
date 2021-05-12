<?php
class Solution {

    /**
     * @param Integer[] $g
     * @param Integer[] $s
     * @return Integer
     */
    function findContentChildren($g, $s) {
        sort($g);
        sort($s);
        $nums = 0;
        $i = $j = 0;
        while ($i < count($g) && $j < count($s)) {
            if ($s[$j] >= $g[$i]) {
                $nums++;
                $i++;
                $j++;
            } else {
                $j++;
            }
        }
        return $nums;
    }
}