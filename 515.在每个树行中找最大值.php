/*
 * @lc app=leetcode.cn id=515 lang=php
 *
 * [515] 在每个树行中找最大值
 */

// @lc code=start
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function largestValues($root) {
        if (!$root) {
            return [];
        }
        $res = [];
        $queue = new SplQueue();
        $queue->push($root);
        while (!$queue->isEmpty()) {
            $count = $queue->count();
            $min = PHP_INT_MIN;
            for ($i = 0; $i < $count; $i++) {
                $node = $queue->dequeue();
                $min = max($min, $node->val);
                if ($node->left) {
                    $queue->enqueue($node->left);
                }
                if ($node->right) {
                    $queue->enqueue($node->right);
                }
            }
            $res[] = $min;
        }
        return $res;
    }
}
// @lc code=end

