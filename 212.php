<?php

class Solution {
    public $result = [];
    public $dx = [1, -1, 0, 0];
    public $dy = [0, 0, -1, 1];

    /**
     * @param String[][] $board
     * @param String[] $words
     * @return String[]
     */
    function findWords($board, $words) {
        $trie = new Trie();
        foreach ($words as $word) {
            $trie->insert($word);
        }
        for ($i = 0; $i < count($board); $i++) {
            for ($j = 0; $j < count($board[0]); $j++) {
                if (array_key_exists($board[$i][$j], $trie->children)) {
                    $this->dfs($board, $i, $j, $trie, "");
                }
            }
        }
        return $this->result;
    }

    function dfs(&$board, $i, $j, Trie &$trie, $word) {
        $char = $board[$i][$j];
        $word .= $char;
        $child = $trie->children[$char];
        if ($child && $child->isEnd) {
            $this->result[] = $word;
            $child->isEnd = false;
        }
        $board[$i][$j] = '#';
        for ($k = 0; $k < 4; $k++) {
            $x = $this->dx[$k] + $i;
            $y = $this->dy[$k] + $j;
            if ($x < 0 || $x >= count($board) || $y < 0 || $y >= count($board[0])) {
                continue;
            }
            if (array_key_exists($board[$x][$y], $child->children)) {
                $this->dfs($board, $x, $y, $child, $word);
            }
        }
        $board[$i][$j] = $char;
        if (empty($child->children)) {
            unset($trie->children[$char]);
        }
    }
}

class Trie {
    public $children = [];
    public $isEnd = false;

    /**
     * Initialize your data structure here.
     */
    function __construct() {

    }

    /**
     * Inserts a word into the trie.
     * @param String $word
     * @return NULL
     */
    function insert($word) {
        $root = $this;
        for ($i = 0; $i < strlen($word); $i++) {
            if (empty($root->children[$word[$i]])) {
                $node = new Trie();
                $root->children[$word[$i]] = $node;
            }
            $root = $root->children[$word[$i]];
        }
        $root->isEnd = true;
    }

    /**
     * Returns if the word is in the trie.
     * @param String $word
     * @return Boolean
     */
    function search($word) {
        $node = $this->searchPrefix($word);
        return $node != null && $node->isEnd;
    }

    /**
     * Returns if there is any word in the trie that starts with the given prefix.
     * @param String $prefix
     * @return Boolean
     */
    function startsWith($prefix) {
        return $this->searchPrefix($prefix) != null;
    }

    function searchPrefix($prefix) {
        $node = $this;
        for ($i = 0; $i < strlen($prefix); $i++) {
            $char = $prefix[$i];
            if (empty($node->children[$char])) {
                return null;
            }
            $node = $node->children[$char];
        }
        return $node;
    }
}