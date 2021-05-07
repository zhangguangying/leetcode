/*
 * @lc app=leetcode.cn id=111 lang=php
 *
 * [111] 二叉树的最小深度
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
     * @return Integer
     */
    function minDepth($root) {
        if (!$root) {
            return 0;
        }
        if ($root->left == null || $root->right == null) {
            return $this->minDepth($root->left) + $this->minDepth($root->right) + 1;
        } else {
            return min($this->minDepth($root->left), $this->minDepth($root->right)) + 1;
        }
    }
}
// @lc code=end

