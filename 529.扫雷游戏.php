<?php
class Solution {
	// private $directX = [0, 0, -1, 1, -1, 1, -1, 1];
	// private $directY = [-1, 1, 0, 0, -1, -1, 1, 1];
    private $directX = [0, 1, 0, -1, 1, 1, -1, -1];
    private $directY = [1, 0, -1, 0, 1, -1, 1, -1];
    /**
     * @param String[][] $board
     * @param Integer[] $click
     * @return String[][]
     */
    function updateBoard($board, $click) {
		$x = $click[0];
		$y = $click[1];
		if ($board[$x][$y] == "M") {
			$board[$x][$y] = "X";
		} else {
			$this->dfs($board, $x, $y);
		}
		return $board;
    }
	
	function dfs(&$board, $x, $y) {
		$mines = 0;
		for ($i = 0; $i < 8; $i++) {
			$dx = $x + $this->directX[$i];
			$dy = $y + $this->directY[$i];
			if ($dx < 0 || $dx >= count($board) || $dy < 0 || $dy >= count($board[0])) {
				continue;
			}
			if ($board[$dx][$dy] == 'M') {
				$mines++;
			}
		}
		if ($mines > 0) {
			$board[$x][$y] = $mines . "";
		} else {
            $board[$x][$y] = 'B';
			for ($i = 0; $i < 8; $i++) {
				$dx = $x + $this->directX[$i];
				$dy = $y + $this->directY[$i];
				if ($dx < 0 || $dx >= count($board) || $dy < 0 || $dy >= count($board[0]) || $board[$dx][$dy] != 'E') {
					continue;
				}
				$this->dfs($board, $dx, $dy);
			}
		}
	}
}