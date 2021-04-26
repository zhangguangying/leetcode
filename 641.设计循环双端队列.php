/*
 * @lc app=leetcode.cn id=641 lang=php
 *
 * [641] 设计循环双端队列
 */

// @lc code=start
class MyCircularDeque {
    private $queue;
    private $length;
    private $capacity;

    /**
     * Initialize your data structure here. Set the size of the deque to be k.
     * @param Integer $k
     */
    function __construct($k) {
        $this->queue = new SplDoublyLinkedList();
        $this->length = 0;
        $this->capacity = $k;
    }
  
    /**
     * Adds an item at the front of Deque. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function insertFront($value) {
        if ($this->isFull()) {
            return false;
        }
        $this->queue->unshift($value);
        $this->length++;
        return true;
    }
  
    /**
     * Adds an item at the rear of Deque. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function insertLast($value) {
        if ($this->isFull()) {
            return false;
        }
        $this->queue->push($value);
        $this->length++;
        return true;
    }
  
    /**
     * Deletes an item from the front of Deque. Return true if the operation is successful.
     * @return Boolean
     */
    function deleteFront() {
        if ($this->isEmpty()) {
            return false;
        }
        $this->queue->shift();
        $this->length--;
        return true;
    }
  
    /**
     * Deletes an item from the rear of Deque. Return true if the operation is successful.
     * @return Boolean
     */
    function deleteLast() {
        if ($this->isEmpty()) {
            return false;
        }
        $this->queue->pop();
        $this->length--;
        return true;
    }
  
    /**
     * Get the front item from the deque.
     * @return Integer
     */
    function getFront() {
        if ($this->isEmpty()) {
            return -1;
        }
        return $this->queue->bottom();
    }
  
    /**
     * Get the last item from the deque.
     * @return Integer
     */
    function getRear() {
        if ($this->isEmpty()) {
            return -1;
        }
        return $this->queue->top();
    }
  
    /**
     * Checks whether the circular deque is empty or not.
     * @return Boolean
     */
    function isEmpty() {
        if ($this->length == 0) {
            return true;
        }
        return false;
    }
  
    /**
     * Checks whether the circular deque is full or not.
     * @return Boolean
     */
    function isFull() {
        if ($this->length == $this->capacity) {
            return true;
        }
        return false;
    }
}

/**
 * Your MyCircularDeque object will be instantiated and called as such:
 * $obj = MyCircularDeque($k);
 * $ret_1 = $obj->insertFront($value);
 * $ret_2 = $obj->insertLast($value);
 * $ret_3 = $obj->deleteFront();
 * $ret_4 = $obj->deleteLast();
 * $ret_5 = $obj->getFront();
 * $ret_6 = $obj->getRear();
 * $ret_7 = $obj->isEmpty();
 * $ret_8 = $obj->isFull();
 */
// @lc code=end

