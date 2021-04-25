/*
 * @lc app=leetcode.cn id=20 lang=php
 *
 * [20] 有效的括号
 */

// @lc code=start
class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s) {
        if (strlen($s) < 2) {
            return false;
        }
        $stack = new SplStack();
        for ($i = 0; $i < strlen($s); $i++) {
            if (in_array($s[$i], ['(', '[', '{'])) {
                $stack->push($s[$i]);
            } else {
                if ($stack->isEmpty()) {
                    return false;
                }
                $symbol = $stack->pop();
                switch ($s[$i]) {
                    case ')':
                        if ($symbol != '(') {
                            return false;
                        }
                        break;
                    case ']':
                        if ($symbol != '[') {
                            return false;
                        }
                        break;
                    case '}':
                        if ($symbol != '{') {
                            return false;
                        }
                        break;
                    default:
                        return false;
                }
            }
        }
        if (!$stack->isEmpty()) {
            return false;
        }
        return true;
    }
}
// @lc code=end

