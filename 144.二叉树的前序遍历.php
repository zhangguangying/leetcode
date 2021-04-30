/*
 * @lc app=leetcode.cn id=144 lang=php
 *
 * [144] 二叉树的前序遍历
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
    function preorderTraversal($root) {
        $result = [];
        $this->preorder($root, $result);
        return $result;
    }

    function preorder($root, &$result)
    {
        if (!$root) {
            return;
        }
        array_push($result, $root->val);
        $this->preorder($root->left, $result);
        $this->preorder($root->right, $result);
    }
}
// @lc code=end

