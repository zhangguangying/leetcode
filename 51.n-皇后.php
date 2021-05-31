<?php

class Solution {

    /**
     * @param Integer $n
     * @return String[][]
     */
    function solveNQueens($n) {
        $col = $pie = $na = $res = $path = [];
        $this->backtrack(0, $col, $pie, $na, $res, $path, $n);
        return $res;
    }

    function backtrack($row, &$col, &$pie, &$na, &$res, &$path, $n) {
        if (count($path) == $n) {
            $res[] = $this->translate($path);
            return;
        }
        for ($i = 0; $i < $n; $i++) {
            if (!$col[$i] && !$pie[$row-$i] && !$na[$row+$i]) {
                array_push($path, $i);
                $col[$i] = true;
                $pie[$i] = true;
                $na[$i] = true;
                $this->backtrack($row+1, $col, $pie, $na, $res, $path, $n);
                array_pop($path);
                $col[$i] = false;
                $pie[$i] = false;
                $na[$i] = false;
            }
        }
    }

    function translate($path) {
        $res = [];
        for ($i = 0; $i < count($path); $i++) {
            $str = str_repeat(".", count($path));
            $str[$path[$i]] = "Q";
            $res[] = $str;
        }
        return $res;
    }
}