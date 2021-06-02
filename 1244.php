<?php

class Leaderboard {
    public $users = [];

    /**
     */
    function __construct() {

    }

    /**
     * @param Integer $playerId
     * @param Integer $score
     * @return NULL
     */
    function addScore($playerId, $score) {
        $this->users[$playerId] = isset($this->users[$playerId]) ? $this->users[$playerId] + $score : $score;
        arsort($this->users);
    }

    /**
     * @param Integer $K
     * @return Integer
     */
    function top($K) {
        reset($this->users);
        $count = 0;
        for ($i = 0; $i < $K; $i++) {
            $count += current($this->users);
            next($this->users);
        }
        return $count;
    }

    /**
     * @param Integer $playerId
     * @return NULL
     */
    function reset($playerId) {
        unset($this->users[$playerId]);
    }
}

/**
 * Your Leaderboard object will be instantiated and called as such:
 * $obj = Leaderboard();
 * $obj->addScore($playerId, $score);
 * $ret_2 = $obj->top($K);
 * $obj->reset($playerId);
 */