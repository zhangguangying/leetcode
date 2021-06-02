<?php

class Solution {

    /**
     * @param Integer[] $arr1
     * @param Integer[] $arr2
     * @return Integer[]
     */
    function relativeSortArray($arr1, $arr2) {
        $frequence = [];
        for ($i = 0; $i <= 1000; $i++) {
            $frequence[$i] = 0;
        }
        for ($i = 0; $i < count($arr1); $i++) {
            $frequence[$arr1[$i]]++;
        }
        $k = 0;
        for ($i = 0; $i < count($arr2); $i++) {
            while ($frequence[$arr2[$i]]) {
                $arr1[$k++] = $arr2[$i];
                $frequence[$arr2[$i]]--;
            }
        }
        for ($i = 0; $i <= 1000; $i++) {
            while ($frequence[$i]) {
                $arr1[$k++] = $i;
                $frequence[$i]--;
            }
        }
        return $arr1;
    }
}