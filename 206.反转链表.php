/*
 * @lc app=leetcode.cn id=206 lang=php
 *
 * [206] 反转链表
 */

// @lc code=start
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function reverseList($head) {
        if ($head == null || $head->next == null) {
            return $head;
        }
        $newHead = $this->reverseList($head->next);
        $head->next->next = $head;
        $head->next = null;
        return $newHead;

        /**$prev = null;
        while ($head != null) {
            $next = $head->next;
            $head->next = $prev;
            $prev = $head;
            $head = $next;
        }
        return $prev;*/
    }
}
// @lc code=end

