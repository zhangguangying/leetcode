/*
 * @lc app=leetcode.cn id=145 lang=php
 *
 * [145] 二叉树的后序遍历
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
    function postorderTraversal($root) {
        $stack = new SplStack();
        $result = [];
        $prev = null;
        while (!$stack->isEmpty() || $root != null) {
            while ($root != null) {
                $stack->push($root);
                $root = $root->left;
            }
            $root = $stack->pop();
            if ($root->right == null || $root->right == $prev) {
                array_push($result, $root->val);
                $prev = $root;
                $root = null;
            } else {
                $stack->push($root);
                $root = $root->right;
            }
        }
        return $result;
    }
}
// @lc code=end

