/*
 * @lc app=leetcode.cn id=98 lang=php
 *
 * [98] 验证二叉搜索树
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
     * @return Boolean
     */
    function isValidBST($root) {
        return $this->helper($root, PHP_INT_MIN, PHP_INT_MAX);
    }

    function helper($root, $lower, $upper) {
        if ($root == null) {
            return true;
        }
        if ($root->val <= $lower || $root->val >= $upper) {
            return false;
        }
        return $this->helper($root->left, $lower, $root->val) && $this->helper($root->right, $root->val, $upper);
    }
}
// @lc code=end

