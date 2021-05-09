/*
 * @lc app=leetcode.cn id=47 lang=php
 *
 * [47] 全排列 II
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permuteUnique($nums) {
        sort($nums);
        $len = count($nums);
        $res = [];
        $visited = [];
        $path = [];
        $this->helper(0, $nums, $len, $path, $res, $visited);
        return $res;
    }

    function helper($depth, &$nums, $len, &$path, &$res, &$visited) {
        if ($len == $depth) {
            $res[] = $path;
            return;
        }
        for ($i = 0; $i < $len; $i++) {
            if ($visited[$i]) {
                continue;
            }
            if ($i > 0 && $nums[$i] == $nums[$i - 1] && !$visited[$i - 1]) {
                continue;
            }
            array_push($path, $nums[$i]);
            $visited[$i] = true;
            $this->helper($depth + 1, $nums, $len, $path, $res, $visited);
            $visited[$i] = false;
            array_pop($path);
        }
    }
}
// @lc code=end

