/*
 * @lc app=leetcode.cn id=94 lang=php
 *
 * [94] 二叉树的中序遍历
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
    function inorderTraversal($root) {
        $result = [];
        $stack = new SplStack();
        while ($root != null || !$stack->isEmpty()) {
            while ($root != null) {
                $stack->push($root);
                $root = $root->left;
            }
            $root = $stack->pop();
            array_push($result, $root->val);
            $root = $root->right;
        }
        return $result;

        // $result = [];
        // $this->inorderTraversal($root, $result);
        // return $result;
    }

    function inorder($root, &$result) {
        if (!$root) {
            return;
        }
        $this->inorder($root->left);
        array_push($result, $root->val);
        $this->inorder($root->right);
    }
}
// @lc code=end

