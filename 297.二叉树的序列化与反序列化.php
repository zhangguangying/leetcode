/*
 * @lc app=leetcode.cn id=297 lang=php
 *
 * [297] 二叉树的序列化与反序列化
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

class Codec {
    function __construct() {
        
    }
  
    /**
     * @param TreeNode $root
     * @return String
     */
    function serialize($root) {
        $queue = new SplQueue();
        $queue->enqueue($root);
        $result = [];
        while (!$queue->isEmpty()) {
            $node = $queue->dequeue();
            if ($node) {
                $result[] = $node->val;
                $queue->enqueue($node->left);
                $queue->enqueue($node->right);
            } else {
                $result[] = 'null';
            }
        }
        return implode(',', $result);
    }
  
    /**
     * @param String $data
     * @return TreeNode
     */
    function deserialize($data) {
        $queue = new SplQueue();
        $strs = explode(',', $data);
        $root = new TreeNode($strs[0]);
        $queue->enqueue($root);
        for ($i = 1; $i < count($strs); ) {
            $node = $queue->dequeue();
            $leftVal = $strs[$i];
            $rightVal = $strs[$i + 1];
            if ($leftVal != 'null') {
                $node->left = new TreeNode($leftVal);
                $queue->enqueue($node->left);
            }
            if ($rightVal != 'null') {
                $node->right = new TreeNode($rightVal);
                $queue->enqueue($node->right);
            }
            $i+=2;
        }
        return $root;
    }
}

/**
 * Your Codec object will be instantiated and called as such:
 * $ser = Codec();
 * $deser = Codec();
 * $data = $ser->serialize($root);
 * $ans = $deser->deserialize($data);
 */
// @lc code=end

