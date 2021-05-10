/*
 * @lc app=leetcode.cn id=433 lang=php
 *
 * [433] 最小基因变化
 */

// @lc code=start
class Solution {

    /**
     * @param String $start
     * @param String $end
     * @param String[] $bank
     * @return Integer
     */
    function minMutation($start, $end, $bank) {
        if (!in_array($end, $bank)) {
            return -1;
        }
        $bank = array_flip($bank);
        $queue = new SplQueue();
        $queue->enqueue([$start, 0]);
        while (!$queue->isEmpty()) {
            $count = $queue->count();
            for ($i = 0; $i < $count; $i++) {
                list($mid, $level) = $queue->dequeue();
                if ($mid == $end) {
                    return $level;
                }
                for ($j = 0; $j < strlen($mid); $j++) {
                    $newMid = $mid;
                    foreach (["A", "C", "G", "T"] as $char) {
                        $newMid[$j] = $char;
                        if (isset($bank[$newMid])) {
                            $queue->enqueue([$newMid, $level + 1]);
                            unset($bank[$newMid]);
                        }
                    }
                }
            }
        }
        return -1;
    }
}
// @lc code=end

