<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * 
 */

class Attractions extends CI_Model {
    
    // Data for the attractions of our Zurich website
    var $data = array(
        array('id' => '1', 
            'category' => 'Eat', 
            'image' => '../../assets/images/restaurant.jpg', 
            'where'=>'/eat/1',
            'caption' => 'Lindenhofkeller: Wine Lovers Sanctuary',
            'desc' => 'If you like to eat and drink this wine, then you are in 
                       Lindenhofkeller to the right place. Since 1860, the 
                       restaurant Gastronomic delights high above the Limmat. 
                       Since 1996, it is mainly the cooking skills of René K. 
                       Hofer , the lure daily business people, tourists and wine
                       lovers in the cozy Lindenhofkeller. Please note that for 
                       groups of 7 or a menu choice is imperative.',
            'date' => '2014/09/25',
            'subimg1' =>'../../assets/images/lindenhofkeller1.jpeg',
            'subimg2' =>'../../assets/images/lindenhofkeller2.jpg',
            'subimg3' =>'../../assets/images/lindenhofkeller3.jpg'),
        array('id' => '2', 
            'category' => 'Sleep', 
            'image' => '../../assets/images/sleep.jpg', 
            'where'=>'/sleep/2',
            'caption' => 'Leoneck Hotel: The Centre of Zurich',
            'desc' => 'The Leoneck Hotel is furnished in original Ethno style 
                       and located in a prime location in the centre of Zurich City. In 
                       just six minutes, you can walk to the main train station, the 
                       shopping area, the banking district, the university, and the 
                       hospitals.',
            'date' => '2014/08/29',
            'subimg1' =>'../../assets/images/lindenhofkeller1.jpeg',
            'subimg2' =>'../../assets/images/lindenhofkeller2.jpg',
            'subimg3' =>'../../assets/images/lindenhofkeller3.jpg'),
            
        array('id' => '3', 
            'category' => 'Play', 
            'image' => '../../assets/images/attractions.jpg', 
            'where'=>'/play/3',
            'caption' => 'Felsenegg\'s Cableway: Skyview of Zurich',
            'desc' => 'From Adliswil, just outside Zurich in the Sihl Valley, 
                       you get to Felsenegg with the one and only public 
                       cableway in canton Zurich, which is part of the Zurich 
                       agglomerative transport association. From the restaurant 
                       terrace you enjoy sweeping views over the city of Zurich 
                       and its lake – and a beautiful sea of lights by night.',
            'date' => '2014/09/28',
            'subimg1' =>'../../assets/images/lindenhofkeller1.jpeg',
            'subimg2' =>'../../assets/images/lindenhofkeller2.jpg',
            'subimg3' =>'../../assets/images/lindenhofkeller3.jpg'),
        array('id' => '4', 
            'category' => 'Eat', 
            'image' => '../../assets/images/metropol.jpg', 
            'where'=>'/eat/4',
            'caption' => 'Metropol: Cafe with a Terrace',
            'desc' => 'In every METROPOLis around the world, whether New York, 
                      Paris, London or Amsterdam, there is always one special 
                      place where you like to go. That is also the case in Zurich.
                      The neo-baroque building located between the Limmat and 
                      the Bahnhofstrasse is home to a cafe with a terrace, a 
                      and the METROPOL restaurant. In the morning, this is the 
                      perfect place to enjoy a cup of coffee and read the 
                      newspaper in peace or enjoy a delicious breakfast. Our 
                      special club sandwich, healthy salads or even Wiener 
                      Schnitzel are available at lunch and throughout the rest
                      of the day. Early in the evening, the bar fills with 
                      people having an after-work cocktail.',
            'date' => '2014/09/21',
            'subimg1' =>'../../assets/images/metropol1.jpg',
            'subimg2' =>'../../assets/images/metropol2.jpg',
            'subimg3' =>'../../assets/images/metropol3.jpg'),
    );
    
    // Constructor
    public function __construct() {
        parent::__construct();
    }
    
    // retrieve a single attraction
    public function get($which) {
        // iterate over the data until we find the one we want
        foreach ($this->data as $record)
            if ($record['id'] == $which)
                return $record;
        return null;
    }

    // retrieve all of the attractions
    public function all() {
        return $this->data;
    }

    // retrieve the first attraction
    public function first() {
        return $this->data[0];
    }

    // retrieve the last attraction
    public function last() {
        $index = count($this->data) - 1;
        return $this->data[$index];
    }
    
    // retrieve the most recently added attraction
    public function getMostRecent() {
        $recent = $this->data[0];
        //iterate over the data until we find the most recently published article
        foreach($this->data as $record){
            if($record['date'] > $recent['date'])
            {
                $recent = $record;
            }
        }
        return $recent;
    }
    
    // retrieve all of the attractions in the specified category
    public function getAllAttractionsInCategory($category) {
        $catAttractions = array();
        
        foreach($this->data as $record) {
            if($record['category'] == $category) {
                $catAttractions[] = $record;
            }
        }
        
        return $catAttractions;
    }
    
    // retrieve each categories most recently added attractions 
    public function getMostRecentAttractions() {
        // create new array of size 3 and add first 3 attractions
        $recentAttractions = array_slice($this->data, 0, 3, true);
        $recentEat = $recentAttractions[0];
        $recentSleep = $recentAttractions[1];
        $recentPlay = $recentAttractions[2];
        
        foreach($this->data as $record) {
            if($record['category'] == 'Eat') {
                if($record['date'] > $recentEat['date']) {
                    $recentAttractions[0] = $record;
                }
            }
            
            if($record['category'] == 'Sleep') {
                if($record['date'] > $recentSleep['date']) {
                    $recentAttractions[1] = $record;
                }
            }
            
            if($record['category'] == 'Play') {
                if($record['date'] > $recentPlay['date']) {
                    $recentAttractions[2] = $record;
                }
            }
        }
        return $recentAttractions;
    }
}