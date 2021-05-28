<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function longestValidParentheses($s) {
        $m = strlen($s);
        if ($m < 2) {
            return 0;
        }
        $stack = new SplStack();
        $stack->push(-1);
        $length = $maxLength = 0;
        for ($i = 0; $i < $m; $i++) {
            if ($s[$i] == "(") {
                $stack->push($i);
            } else {
                $stack->pop();
                if ($stack->isEmpty()) {
                    $stack->push($i);
                    $length = 0;
                } else {
                    $length = $i - $stack->top();
                    $maxLength = max($maxLength, $length);
                }
            }
        }
        return $maxLength;
    }

    /**
     * @param String $s
     * @return Integer
     */
    function longestValidParentheses1($s) {
        $m = strlen($s);
        if ($m < 2) {
            return 0;
        }
        $dp = array_fill(0, $m, 0);
        for ($i = 1; $i < $m; $i++) {
            if ($s[$i] == "(") {
                continue;
            }
            $index = $i - $dp[$i-1] - 1;
            if ($index >= 0 && $s[$index] == "(") {
                $dp[$i] = 2 + $dp[$i-1] + $dp[$index-1];
            }
        }
        return max($dp);
    }
}