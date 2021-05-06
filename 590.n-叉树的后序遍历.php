/*
 * @lc app=leetcode.cn id=590 lang=php
 *
 * [590] N 叉树的后序遍历
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
     * @return integer[]
     */
    function postorder($root) {
        $stack = new SplStack();
        $result = [];
        $stack->push($root);
        while (!$stack->isEmpty()) {
            $node = $stack->pop();
            array_push($result, $node->val);
            foreach ($node->children as $child) {
                $stack->push($child);
            }
        }
        return array_reverse($result);
    }
}
// @lc code=end

