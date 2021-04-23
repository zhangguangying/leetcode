/*
 * @lc app=leetcode.cn id=142 lang=php
 *
 * [142] 环形链表 II
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
     * @return ListNode
     */
    function detectCycle($head) {
        $slow = $head->next;
        $fast = $head->next->next;
        while ($fast->next != null) {
            if ($slow == $fast) {
                $ptr = $head;
                while ($slow != $ptr) {
                    $slow = $slow->next;
                    $ptr = $ptr->next;
                }
                return $ptr;
            }
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        return null;
    }
}
// @lc code=end

