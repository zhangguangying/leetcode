/*
 * @lc app=leetcode.cn id=1 lang=php
 *
 * [1] 两数之和
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $arr = [];
        for ($i = 0, $count = count($nums); $i < $count; $i++) {
            if (isset($arr[$target - $nums[$i]])) {
                return [$arr[$target - $nums[$i]], $i];
            }
            $arr[$nums[$i]] = $i;
        }
        return [];
    }
}
// @lc code=end

