/*
 * @lc app=leetcode.cn id=66 lang=php
 *
 * [66] 加一
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $digits
     * @return Integer[]
     */
    function plusOne($digits) {
        $len = count($digits);
        for ($i = $len - 1; $i >= 0; $i--) {
            $digits[$i]++;
            $digits[$i] = $digits[$i] % 10;
            if ($digits[$i] != 0) {
                return $digits;
            }
        }
        $newDigits = [];
        $newDigits[0] = 1;
        for ($i = 1; $i <= $len; $i++) {
            $newDigits[$i] = 0;
        }
        return $newDigits;
    }
}
// @lc code=end

