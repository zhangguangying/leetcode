/*
 * @lc app=leetcode.cn id=236 lang=php
 *
 * [236] 二叉树的最近公共祖先
 */

// @lc code=start
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */

class Solution {
    private $ans = [];

    /**
     * @param TreeNode $root
     * @param TreeNode $p
     * @param TreeNode $q
     * @return TreeNode
     */
    function lowestCommonAncestor($root, $p, $q) {
        $this->dfs($root);
        $visited = [];
        while ($p != null) {
            $visited[$p->val] = $p->val;
            $p = $this->ans[$p->val];
        }
        while ($q != null) {
            if (isset($visited[$q->val])) {
                return $q;
            }
            $q = $this->ans[$q->val];
        }
    }

    function dfs($root) {
        if ($root->left != null) {
            $this->ans[$root->left->val] = $root;
            $this->dfs($root->left);
        }
        if ($root->right != null) {
            $this->ans[$root->right->val] = $root;
            $this->dfs($root->right);
        }
    }
}
// @lc code=end

