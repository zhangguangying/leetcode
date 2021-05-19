<?php

class Solution {

    /**
     * @param String $text1
     * @param String $text2
     * @return Integer
     */
    function longestCommonSubsequence($text1, $text2) {
        $opt = [];
        $m = strlen($text1);
        $n = strlen($text2);
        for ($i = 0; $i <= $m; $i++) {
            $opt[$i] = array_fill(0, $n+1, 0);
        }
        for ($i = 1; $i <= $m; $i++) {
            $char1 = $text1[$i - 1];
            for ($j = 1; $j <= $n; $j++) {
                $char2 = $text2[$j - 1];
                if ($char1 == $char2) {
                    $opt[$i][$j] = $opt[$i-1][$j-1] + 1;
                } else {
                    $opt[$i][$j] = max($opt[$i-1][$j], $opt[$i][$j-1]);
                }
            }
        }
        return $opt[$m][$n];
    }
}