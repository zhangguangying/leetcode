/*
 * @lc app=leetcode.cn id=51 lang=php
 *
 * [51] N 皇后
 */

// @lc code=start
class Solution {

    /**
     * @param Integer $n
     * @return String[][]
     */
    function solveNQueens($n) {
        $col = [];
        $pie = [];
        $na = [];
        $res = [];
        $path = [];
        $this->helper(0, $n, $col, $pie, $na, $res, $path);
        return $res;
    }

    function helper($row, $n, $col, $pie, $na, &$res, $path) {
        if ($row == $n) {
            $res[] = $this->translate($path);
            return;
        }
        for ($i = 0; $i < $n; $i++) {
            if (!$col[$i] && !$pie[$row + $i] && !$na[$row - $i]) {
                array_push($path, $i);
                $col[$i] = true;
                $pie[$row + $i] = true;
                $na[$row - $i] = true;
                $this->helper($row + 1, $n, $col, $pie, $na, $res, $path);
                array_pop($path);
                $col[$i] = false;
                $pie[$row + $i] = false;
                $na[$row - $i] = false;
            }
        }
    }

    function translate($path) {
        $res = [];
        foreach ($path as $num) {
            $str = str_repeat(".", count($path));
            $str[$num] = "Q";
            $res[] = $str;
        }
        return $res;
    }
}
// @lc code=end

