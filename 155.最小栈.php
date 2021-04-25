/*
 * @lc app=leetcode.cn id=155 lang=php
 *
 * [155] 最小栈
 */

// @lc code=start

class Node
{
    public $val;
    public $next;
    public $min;

    public function __construct($val, $min, $next) 
    {
        $this->val = $val;
        $this->min = $min;
        $this->next = $next;
    }
}

class MinStack {
    private $stack = null;

    /**
     * initialize your data structure here.
     */
    function __construct() {

    }

    /**
     * @param Integer $val
     * @return NULL
     */
    function push($val) {
        if ($this->stack == null) {
            $this->stack = new Node($val, $val, $this->stack);
        } else {
            $node = new Node($val, min($val, $this->stack->min), $this->stack);
            $this->stack = $node;
        }
    }

    /**
     * @return NULL
     */
    function pop() {
        $this->stack = $this->stack->next;
    }

    /**
     * @return Integer
     */
    function top() {
        return $this->stack->val;
    }

    /**
     * @return Integer
     */
    function getMin() {
        return $this->stack->min;
    }
}

/**
 * Your MinStack object will be instantiated and called as such:
 * $obj = MinStack();
 * $obj->push($val);
 * $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->getMin();
 */
// @lc code=end

