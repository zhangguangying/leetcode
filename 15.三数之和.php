/*
 * @lc app=leetcode.cn id=15 lang=php
 *
 * [1] 两数之和
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums) {
        sort($nums);
        $count = count($nums);
        $arr = [];
        for ($i = 0, $length = $count - 2; $i < $length; $i++) {
            if ($nums[$i] > 0) {
                break;
            }
            if ($i > 0 && $nums[$i] == $nums[$i - 1]) {
                continue;
            }

            $j = $i + 1;
            $k = $count - 1;
            while ($j < $k) {
                $sum = $nums[$i] + $nums[$j] + $nums[$k];
                if ($sum < 0) {
                    $j++;
                    while ($j < $k && $nums[$j] == $nums[$j - 1]) {
                        $j++;
                    }
                } else if ($sum > 0) {
                    $k--;
                    while ($j < $k && $nums[$k] == $nums[$k + 1]) {
                        $k--;
                    }
                } else {
                    $arr[] = [$nums[$i], $nums[$j], $nums[$k]];
                    $j++;
                    $k--;
                    while ($j < $k && $nums[$j] == $nums[$j - 1]) {
                        $j++;
                    }
                    while ($j < $k && $nums[$k] == $nums[$k + 1]) {
                        $k--;
                    }
                }
            }
        }
        return $arr;
    }
}
// @lc code=end


