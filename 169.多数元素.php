/*
 * @lc app=leetcode.cn id=169 lang=php
 *
 * [169] 多数元素
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function majorityElement($nums) {
        $count = 0;
        $cadicate = null;
        for ($i = 0; $i < count($nums); $i++) {
            if ($count == 0) {
                $cadicate = $nums[$i];
            }
            $count = $cadicate == $nums[$i] ? $count + 1 : $count - 1;
        }
        return $cadicate;
    }
}
// @lc code=end

