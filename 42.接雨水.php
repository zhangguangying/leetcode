/*
 * @lc app=leetcode.cn id=42 lang=php
 *
 * [42] 接雨水
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap($height) {
        // 1. 暴力求解：对于每一根柱子，都找到它的左最大柱子与右最大柱子，两柱子中的小值与当前柱子的差，就是当前柱子的容量
        // 2. 提前计算好每一根柱子的左最大值与右最大值
        $len = count($height);
        $ans = 0;
        $left = [];
        $right = [];

        $left[0] = $height[0];
        for ($i = 1; $i < $len; $i++) {
            $left[$i] = max($height[$i], $left[$i - 1]);
        }
        $right[$len - 1] = $height[$len - 1];
        for ($i = $len - 2; $i >= 0; $i--) {
            $right[$i] = max($height[$i], $right[$i + 1]);
        }

        for ($i = 1; $i < $len - 1; $i++) {
            $iMax = min($left[$i], $right[$i]) - $height[$i];
            if ($iMax > 0) {
                $ans += $iMax;
            }
        }

        return $ans;
    }
}
// @lc code=end

