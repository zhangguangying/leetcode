<?php

class Solution {

    /**
     * @param Integer[][] $intervals
     * @return Integer[][]
     */
    function merge($intervals) {
        usort($intervals, function ($a, $b) {
            if ($a[0] == $b[0]) {
                return 0;
            }
            return $a[0] < $b[0] ? -1 : 1;
        });

        $result = [];
        for ($i = 0; $i < count($intervals); $i++) {
            $start = $intervals[$i][0];
            $end = $intervals[$i][1];
            while ($i < count($intervals) - 1 && $end >= $intervals[$i+1][0]) {
                if ($end < $intervals[$i+1][1]) {
                    $end = $intervals[$i+1][1];
                }
                $i++;
            }
            $result[] = [$start, $end];
        }
        return $result;
    }
}