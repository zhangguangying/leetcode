/*
 * @lc app=leetcode.cn id=21 lang=php
 *
 * [21] 合并两个有序链表
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
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2) {
        $newList = new ListNode();
        $cur = $newList;
        while ($l1 != null && $l2 != null) {
            if ($l1->val < $l2->val) {
                $cur->next = $l1;
                $l1 = $l1->next;
            } else {
                $cur->next = $l2;
                $l2 = $l2->next;
            }
            $cur = $cur->next;
        }
        if ($l1 != null) {
            $cur->next = $l1;
        }
        if ($l2 != null) {
            $cur->next = $l2;
        }
        return $newList->next;
    }
}
// @lc code=end

