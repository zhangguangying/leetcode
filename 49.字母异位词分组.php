/*
 * @lc app=leetcode.cn id=49 lang=php
 *
 * [49] 字母异位词分组
 */

// @lc code=start
class Solution {

    /**
     * @param String[] $strs
     * @return String[][]
     */
    function groupAnagrams($strs) {
        $arr = [];
        foreach ($strs as $str) {
            $temp = str_split($str, 1);
            sort($temp);
            $temp = implode('', $temp);
            $arr[$temp][] = $str;
        }
        return $arr;
    }
}
// @lc code=end

