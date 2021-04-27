/*
 * @lc app=leetcode.cn id=88 lang=php
 *
 * [88] 合并两个有序数组
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer $m
     * @param Integer[] $nums2
     * @param Integer $n
     * @return NULL
     */
    function merge(&$nums1, $m, $nums2, $n) {
        // 1. 新开一个数组，依次比较nums1和nums2的各个元素，放入新数组
        // 2. 从后往前比较两个数组元素，直到一个数组中的元素比较完成
        $i = $m - 1;
        $j = $n - 1;
        $tail = $m + $n - 1;
        while ($i != -1 && $j != -1) {
            if ($nums1[$i] > $nums2[$j]) {
                $nums1[$tail--] = $nums1[$i--];
            } else {
                $nums1[$tail--] = $nums2[$j--];
            }
        }
        while ($j != -1) {
            $nums1[$tail--] = $nums2[$j--];
        }
    }
}
// @lc code=end

