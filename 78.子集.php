/*
 * @lc app=leetcode.cn id=78 lang=php
 *
 * [78] 子集
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets($nums) {
        $res = [];
        $path = [];
        $this->backtrack(0, $nums, count($nums), $res, $path);
        return $res;
    }

    function backtrack($level, &$nums, $len, &$res, &$path) {
        $res[] = $path;
        for ($i = $level; $i < $len; $i++) {
            array_push($path, $nums[$i]);
            $this->backtrack($i + 1, $nums, $len, $res, $path);
            array_pop($path);
        }
    }
}
// @lc code=end

