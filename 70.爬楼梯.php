/*
 * @lc app=leetcode.cn id=70 lang=php
 *
 * [70] 爬楼梯
 */

// @lc code=start
class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function climbStairs($n) {
        if ($n <= 2) {
            return $n;
        }
        $i = 1;
        $j = 2;
        $k = 3;
        for ($a = 3; $a <= $n; $a++) {
            $k = $i + $j;
            $i = $j;
            $j = $k;
        }
        return $k;
    }
}
// @lc code=end

