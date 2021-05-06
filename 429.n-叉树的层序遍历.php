/*
 * @lc app=leetcode.cn id=429 lang=php
 *
 * [429] N 叉树的层序遍历
 */

// @lc code=start
/**
 * Definition for a Node.
 * class Node {
 *     public $val = null;
 *     public $children = null;
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->children = array();
 *     }
 * }
 */

class Solution {
    /**
     * @param Node $root
     * @return integer[][]
     */
    function levelOrder($root) {
        if (!$root) {
            return [];
        }
		$queue = new SplQueue();
        $result = [];
        $queue->enqueue($root);
        while (!$queue->isEmpty()) {
            $level = [];
            $len = $queue->count();
            for ($i = 0; $i < $len; $i++) {
                $node = $queue->dequeue();
                array_push($level, $node->val);
                foreach ($node->children as $child) {
                    $queue->enqueue($child);
                }
            }
            $result[] = $level;
        }
        return $result;
    }
}
// @lc code=end

