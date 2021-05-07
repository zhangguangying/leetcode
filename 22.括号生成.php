/*
 * @lc app=leetcode.cn id=22 lang=php
 *
 * [22] 括号生成
 */

// @lc code=start
class Solution {
    private $result = [];


    /**
     * @param Integer $n
     * @return String[]
     */
    function generateParenthesis($n) {
        $this->generate(0, 0, $n, '');
        return $this->result;
    }


    function generate($left, $right, $n, $s) {
        if ($left + $right == 2 * $n) {
            array_push($this->result, $s);
            return;
        }
        if ($left < $n) {
            $this->generate($left + 1, $right, $n, $s . '(');
        }
        if ($right < $left) {
            $this->generate($left, $right + 1, $n, $s . ')');
        }
    }
}
// @lc code=end

