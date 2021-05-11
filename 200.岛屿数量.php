<?php
class Solution {

    /**
     * @param String[][] $grid
     * @return Integer
     */
    function numIslands($grid) {
		$nums = 0;
		for ($i = 0; $i < count($grid); $i++) {
			for ($j = 0; $j < count($grid[0]); $j++) {
				if ($grid[$i][$j] == '1') {
					$nums++;
					$this->dfs($grid, $i, $j);
				}
			}
		}
		return $nums;
    }
	
	function dfs(&$grid, $i, $j) {
		if ($i < 0 || $i >= count($grid) || $j < 0 || $j >= count($grid[0]) || $grid[$i][$j] == '0') {
			return;
		}
		$grid[$i][$j] = '0';
		$this->dfs($grid, $i - 1, $j);
		$this->dfs($grid, $i + 1, $j);
		$this->dfs($grid, $i, $j - 1);
		$this->dfs($grid, $i, $j + 1);
	}
}