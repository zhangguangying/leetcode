/*
 * @lc app=leetcode.cn id=24 lang=php
 *
 * [24] 两两交换链表中的节点
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
    function swapPairs($head) {
        $dummyHead = new ListNode(0);
        $dummyHead->next = $head;
        $temp = $dummyHead;
        while ($temp->next != null && $temp->next->next != null) {
            $node1 = $temp->next;
            $node2 = $temp->next->next;
            $temp->next = $node2;
            $node1->next = $node2->next;
            $node2->next = $node1;
            $temp = $node1;
        }
        return $dummyHead->next;
    }
}
// @lc code=end

