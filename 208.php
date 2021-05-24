<?php

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

/**
 * Your Trie object will be instantiated and called as such:
 * $obj = Trie();
 * $obj->insert($word);
 * $ret_2 = $obj->search($word);
 * $ret_3 = $obj->startsWith($prefix);
 */