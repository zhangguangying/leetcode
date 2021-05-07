/*
 * @lc app=leetcode.cn id=226 lang=php
 *
 * [226] 翻转二叉树
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
     * @return TreeNode
     */
    function invertTree($root) {
        if (!$root) {
            return;
        }
        $temp = $root->left;
        $root->left = $root->right;
        $root->right = $temp;
        $this->invertTree($root->left);
        $this->invertTree($root->right);
        return $root;
    }
}
// @lc code=end

