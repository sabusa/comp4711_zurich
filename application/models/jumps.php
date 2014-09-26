<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Jumps extends CI_Model {
    
    var $data = array(
        array('id' => '1', 'who' => 'Eat', 'mug' => '../../assets/images/restaurant.jpg', 'where'=>'/eat',
            'what' => 'Places to eat in Zurich!'),
        array('id' => '2', 'who' => 'Sleep', 'mug' => '../../assets/images/sleep.jpg', 'where'=>'/sleep',
            'what' => 'Places to snooze in Zurich!'),
        array('id' => '3', 'who' => 'Attractions', 'mug' => '../../assets/images/attractions.jpg', 'where'=>'/eat',
            'what' => 'Things to do in Zurich!'),
    );
    
    // Constructor
    public function __construct() {
        parent::__construct();
    }
    
    // retrieve a single quote
    public function get($which) {
        // iterate over the data until we find the one we want
        foreach ($this->data as $record)
            if ($record['id'] == $which)
                return $record;
        return null;
    }

    // retrieve all of the quotes
    public function all() {
        return $this->data;
    }

    // retrieve the first quote
    public function first() {
        return $this->data[0];
    }

    // retrieve the last quote
    public function last() {
        $index = count($this->data) - 1;
        return $this->data[$index];
    }
}