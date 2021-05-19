<?php
class Solution {

    /**
     * @param Integer $m
     * @param Integer $n
     * @return Integer
     */
    function uniquePaths($m, $n) {
        $opt = [];
        for ($i = 0; $i < $m; $i++) {
            $opt[$i][0] = 1;
        }
        for ($j = 0; $j < $n; $j++) {
            $opt[0][$j] = 1;
        }
        for ($i = 1; $i < $m; $i++) {
            for ($j = 1; $j < $n; $j++) {
                $opt[$i][$j] = $opt[$i-1][$j] + $opt[$i][$j-1];
            }
        }
        return $opt[$m-1][$n-1];
    }

}