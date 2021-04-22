/*
 * @lc app=leetcode.cn id=11 lang=php
 *
 * [11] 盛最多水的容器
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height) {
        $max = 0;
        for ($i = 0, $j = count($height) - 1; $i < $j;) {
            $minHeight = $height[$i] < $height[$j] ? $height[$i++] : $height[$j--];
            $area = ($j - $i + 1) * $minHeight;
            $max = max($area, $max);
        }
        return $max;
    }
}
// @lc code=end

