<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * 
 */

class Jumps extends CI_Model {
    
    // Data for the attractions of our Zurich website
    var $data = array(
        array('id' => '1', 
            'who' => 'Eat', 
            'mug' => '../../assets/images/restaurant.jpg', 
            'where'=>'/eat',
            'what' => 'Where would you like to eat',
            'desc' => 'Lorem ipsum dolor sit amet, nostro iracundia mea ei, vix prodesset 
    argumentum assueverit ad, veri impedit ponderum ei sed. Justo clita persius 
    pro an, est idque audire concludaturque in, cu assum gloriatur sit. Utroque
    adipiscing in sea, his meliore posidonium ei. Cum ea molestie appellantur. 
    Et ius duis aliquam repudiandae. Mei melius ornatus no, feugiat recusabo 
    efficiendi sed id.'),
        array('id' => '2', 
            'who' => 'Sleep', 
            'mug' => '../../assets/images/sleep.jpg', 
            'where'=>'/sleep',
            'what' => 'Where would you like to stay',
            'desc' => 'Lorem ipsum dolor sit amet, nostro iracundia mea ei, vix prodesset 
    argumentum assueverit ad, veri impedit ponderum ei sed. Justo clita persius 
    pro an, est idque audire concludaturque in, cu assum gloriatur sit. Utroque
    adipiscing in sea, his meliore posidonium ei. Cum ea molestie appellantur. 
    Et ius duis aliquam repudiandae. Mei melius ornatus no, feugiat recusabo 
    efficiendi sed id.'),
        array('id' => '3', 
            'who' => 'Play', 
            'mug' => '../../assets/images/attractions.jpg', 
            'where'=>'/play',
            'what' => 'What would you like to see',
            'desc' => 'Lorem ipsum dolor sit amet, nostro iracundia mea ei, vix prodesset 
    argumentum assueverit ad, veri impedit ponderum ei sed. Justo clita persius 
    pro an, est idque audire concludaturque in, cu assum gloriatur sit. Utroque
    adipiscing in sea, his meliore posidonium ei. Cum ea molestie appellantur. 
    Et ius duis aliquam repudiandae. Mei melius ornatus no, feugiat recusabo 
    efficiendi sed id.'),
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