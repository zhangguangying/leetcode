/*
 * @lc app=leetcode.cn id=84 lang=php
 *
 * [84] 柱状图中最大的矩形
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $heights
     * @return Integer
     */
    function largestRectangleArea($heights) {
        $stack = new SplStack();
        $left = [];
        $right = [];
        $len = count($heights);
        for ($i = 0; $i < $len; $i++) {
            $right[$i] = $len;
            while (!$stack->isEmpty() && $heights[$stack->top()] >= $heights[$i]) {
                $right[$stack->top()] = $i;
                $stack->pop();
            }
            $left[$i] = $stack->isEmpty() ? -1 : $stack->top();
            $stack->push($i);
        }
        $max = 0;
        for ($i = 0; $i < $len; $i++) {
            $max = max($max, ($right[$i] - $left[$i] - 1) * $heights[$i]);
        }
        return $max;
    }
}
// @lc code=end

