/*
 * @lc app=leetcode.cn id=50 lang=php
 *
 * [50] Pow(x, n)
 */

// @lc code=start
class Solution {

    /**
     * @param Float $x
     * @param Integer $n
     * @return Float
     */
    function myPow($x, $n) {
        if ($n < 0) {
            $n = -$n;
            $x = 1/$x;
        }
        return $this->helper($x, $n);
    }

    function helper($x, $n) {
        if ($n == 0) {
            return 1;
        }
        if ($n == 1) {
            return $x;
        }
        $half = $this->helper($x, $n/2);
        return $n % 2 == 0 ? $half * $half : $half * $half * $x;
    }
}
// @lc code=end

