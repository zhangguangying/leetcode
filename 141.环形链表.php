/*
 * @lc app=leetcode.cn id=141 lang=php
 *
 * [141] 环形链表
 */

// @lc code=start
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */

class Solution {
    /**
     * @param ListNode $head
     * @return Boolean
     */
    function hasCycle($head) {
        $slow = $head->next;
        $fast = $head->next->next;
        while ($fast->next != null) {
            if ($slow == $fast) {
                return true;
            }
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        return false;
    }
}
// @lc code=end

