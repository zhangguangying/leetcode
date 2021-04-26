/*
 * @lc app=leetcode.cn id=239 lang=php
 *
 * [239] 滑动窗口最大值
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function maxSlidingWindow($nums, $k) {
        $queue = new SplQueue();
        $len = count($nums);
        $arr = [];
        for ($i = 0; $i < $k; $i++) {
            while (!$queue->isEmpty() && $queue->top() < $nums[$i]) {
                $queue->pop();
            }
            $queue->push($nums[$i]);
        }
        $arr[] = $queue->bottom();

        for ($j = $k; $j < $len; $j++) {
            if ($queue->bottom() == $nums[$j - $k]) {
                $queue->shift();
            }
            while (!$queue->isEmpty() && $queue->top() < $nums[$j]) {
                $queue->pop();
            }
            $queue->push($nums[$j]);
            $arr[] = $queue->bottom();
        }

        return $arr;
    }
}
// @lc code=end

