/*
 * @lc app=leetcode.cn id=127 lang=php
 *
 * [127] 单词接龙
 */

// @lc code=start
class Solution {

    /**
     * @param String $beginWord
     * @param String $endWord
     * @param String[] $wordList
     * @return Integer
     */
    function ladderLength($beginWord, $endWord, $wordList) {
        if (!in_array($endWord, $wordList)) {
            return 0;
        }
        $wordList = array_flip($wordList);
        $map = [];
        for ($i = 'a'; $i < 'z'; $i++) {
            $map[] = $i;
        }
        $map[] = 'z';
        $queue = new SplQueue();
        $queue->enqueue([$beginWord, 1]);
        while (!$queue->isEmpty()) {
            $count = $queue->count();
            for ($i = 0; $i < $count; $i++) {
                list($mid, $level) = $queue->dequeue();
                if ($mid == $endWord) {
                    return $level;
                }
                for ($j = 0; $j < strlen($mid); $j++) {
                    $newMid = $mid;
                    foreach ($map as $char) {
                        $newMid[$j] = $char;
                        if (isset($wordList[$newMid])) {
                            $queue->enqueue([$newMid, $level + 1]);
                            unset($wordList[$newMid]);
                        }
                    }
                }
            }
        }
        return 0;
    }
}
// @lc code=end

