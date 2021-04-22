/*
 * @lc app=leetcode.cn id=283 lang=php
 *
 * [283] 移动零
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums) {
        $j = 0;
        for ($i = 0, $count = count($nums); $i < $count; $i++) {
            if ($nums[$i] != 0) {
                $tmp = $nums[$i];
                $nums[$i] = 0;
                $nums[$j++] = $tmp;
            }
        }
    }
}