<?php

class Solution {

    /**
     * @param String $beginWord
     * @param String $endWord
     * @param String[] $wordList
     * @return String[][]
     */
    function findLadders($beginWord, $endWord, $wordList) {
		$wordHash = [];
		$findW = false;
		foreach ($wordList as $w) {
			if ($w == $endWord) {
				$findW = true;
			}
			$originW = $w;
			for ($i = 0; $i < strlen($w); $i++) {
				$w[$i] = "?";
				$wordHash[$w][] = $originW;
				$w = $originW;
			}
		}
		if (!$findW) {
			return [];
		}
		$q = [[$beginWord]];
		$res = [];
		while (count($q) > 0) {
			$nq = [];
			$curWordHash = $wordHash;
			$findW = false;
			foreach ($q as $qinfo) {
				$originW = $w = end($qinfo);
				for ($i = 0; $i < strlen($w); $i++) {
					$w[$i] = "?";
					foreach ($curWordHash[$w] as $otherW) {
						if ($otherW == $originW) {
							continue;
						}
						$cp = $qinfo;
						$cp[] = $otherW;
						if ($otherW == $endWord) {
							$res[] = $cp;
							$findW = true;
						} else {
							$nq[] = $cp;
						}
					}
					$wordHash[$w] = [];
					$w = $originW;
				}
			}
			if ($findW) {
				break;
			}
			$q = $nq;
		}
		return $res;
    }	
}