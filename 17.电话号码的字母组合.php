/*
 * @lc app=leetcode.cn id=17 lang=php
 *
 * [17] 电话号码的字母组合
 */

// @lc code=start
class Solution {

    /**
     * @param String $digits
     * @return String[]
     */
    function letterCombinations($digits) {
        $len = strlen($digits);
        $res = [];
        if ($len == 0) {
            return $res;
        }
        $map = [
            2 => "abc",
            3 => "def",
            4 => "ghi",
            5 => "jkl",
            6 => "mno",
            7 => "pqrs",
            8 => "tuv",
            9 => "wxyz"
        ];
        if ($len == 1) {
            return str_split($map[$digits[0]], 1);
        }
        $this->dfs(0, $len, $digits, '', $res, $map);
        return $res;
    }

    function dfs($depth, $len, &$digits, $str, &$res, &$map) {
        if ($depth == $len) {
            $res[] = $str;
            return;
        }
        $chars = $map[$digits[$depth]];
        for ($i = 0; $i < strlen($chars); $i++) {
            $this->dfs($depth + 1, $len, $digits, $str . $chars[$i], $res, $map);
        }
    }
}
// @lc code=end

