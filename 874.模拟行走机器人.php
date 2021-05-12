<?php
class Solution {

    /**
     * @param Integer[] $commands
     * @param Integer[][] $obstacles
     * @return Integer
     */
    function robotSim($commands, $obstacles) {
        $directX = [0, 1, 0, -1];
        $directY = [1, 0, -1, 0];
        $direct = 0;
        $maxSqr = 0;
        $x = $y = 0;
        $temp = [];
        foreach ($obstacles as $obstacle) {
            $temp[$obstacle[0]][$obstacle[1]] = true;
        }
        for ($i = 0; $i < count($commands); $i++) {
            if ($commands[$i] == -1) {
                $direct = ($direct + 1) % 4;
            } else if ($commands[$i] == -2) {
                $direct = ($direct + 3) % 4;
            } else {
                for ($j = 0; $j < $commands[$i]; $j++) {
                    $dx = $x + $directX[$direct];
                    $dy = $y + $directY[$direct];
                    if (isset($temp[$dx][$dy])) {
                        break;
                    }
                    $x = $dx;
                    $y = $dy;
                    $maxSqr = max($maxSqr, $x * $x + $y * $y);
                }
            }
        }
        return $maxSqr;
    }
}