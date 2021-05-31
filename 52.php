<?php

class Solution {
    public $size;
    public $count;

    /**
     * @param Integer $n
     * @return Integer
     */
    function totalNQueens($n) {
        $this->count = 0;
        $this->size = (1 << $n) - 1;
        $this->solve(0, 0, 0);
        return $this->count;
    }

    function solve($row, $ld, $rd) {
        if ($row == $this->size) {
            $this->count++;
            return;
        }
        $pos = $this->size & (~($row | $ld | $rd));
        while ($pos != 0) {
            $p = $pos & -$pos;
            $pos -= $p;
            $this->solve($row|$p, ($ld|$p) << 1, ($rd | $p) >> 1);
        }
    }
}