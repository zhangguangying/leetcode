/*
 * @lc app=leetcode.cn id=26 lang=php
 *
 * [26] 删除有序数组中的重复项
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums) {
        $len = count($nums);
        $slow = 1;
        $fast = 1;
        while ($fast < $len) {
            if ($nums[$fast] != $nums[$fast - 1]) {
                $nums[$slow] = $nums[$fast];
                $slow++;
            }
            $fast++;
        }
        return $slow;
    }
}
// @lc code=end

