/*
 * @lc app=leetcode.cn id=589 lang=php
 *
 * [589] N 叉树的前序遍历
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
    function preorder($root) {
        $result = [];
        $stack = new SplStack();
        $stack->push($root);
        while (!$stack->isEmpty()) {
            $node = $stack->pop();
            array_push($result, $node->val);
            for ($i = count($node->children) - 1; $i >= 0; $i--) {
                $stack->push($node->children[$i]);
            }
        }
        return $result;
    }
}
// @lc code=end

