/*
 * @lc app=leetcode.cn id=242 lang=php
 *
 * [242] 有效的字母异位词
 */

// @lc code=start
class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isAnagram($s, $t) {
        // 1. 暴力解法：排序，判断是否相等
        // 2. 哈希表 + 计数：计算每个字符出现的次数
        if (strlen($s) != strlen($t)) {
            return false;
        }
        $arr = [];
        for ($i = 0; $i < strlen($s); $i++) {
            if (isset($arr[$s[$i]])) {
                $arr[$s[$i]]++;
            } else {
                $arr[$s[$i]] = 1;
            }
        }
        for ($i = 0; $i < strlen($t); $i++) {
            if (isset($arr[$t[$i]])) {
                $arr[$t[$i]]--;
            } else {
                $arr[$t[$i]] = -1;
            }
            if ($arr[$t[$i]] < 0) {
                return false;
            }
        }
        return true;
    }
}
// @lc code=end

