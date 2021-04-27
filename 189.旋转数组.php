/*
 * @lc app=leetcode.cn id=189 lang=php
 *
 * [189] 旋转数组
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return NULL
     */
    function rotate(&$nums, $k) {
        // 1. 先整个反转，再反转前半部分，再反转后半部分
        // 2. 新开一个数组，原数组元素的位置在新数组中的位置为 ($i+$k)%$len
        $len = count($nums);
        $k = $k % $len;
        $this->reverse($nums, 0, $len - 1);
        $this->reverse($nums, 0, $k - 1);
        $this->reverse($nums, $k, $len - 1);
    }

    function reverse(&$nums, $start, $end)
    {
        while ($start < $end) {
            $temp = $nums[$start];
            $nums[$start++] = $nums[$end];
            $nums[$end--] = $temp;
        }
    }


}
// @lc code=end

