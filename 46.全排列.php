/*
 * @lc app=leetcode.cn id=46 lang=php
 *
 * [46] 全排列
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute($nums) {
        $len = count($nums);
        $res = [];
        if ($len == 0) {
            return $res;
        }
        $path = [];
        $used = [];
        $this->dfs($nums, $len, 0, $path, $used, $res);
        return $res;
    }

    function dfs(&$nums, $len, $depth, &$path, &$used, &$res) {
        if ($depth == $len) {
            $res[] = $path;
            return;
        }
        for ($i = 0; $i < $len; $i++) {
            if ($used[$i]) {
                continue;
            }
            array_push($path, $nums[$i]);
            $used[$i] = true;
            $this->dfs($nums, $len, $depth + 1, $path, $used, $res);
            array_pop($path);
            $used[$i] = false;
        }
    }
}
// @lc code=end

