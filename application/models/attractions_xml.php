<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Attractions_xml extends MY_Model {
    //constructor
    function __construct() {
        parent::__construct('attraction_withxml', '_id');
        $records = $this->all();
    }
   
    public function getID($which) {
        $records = $this->all();
        foreach ($records as $record)
            if ($record->_id == $which)
                return $record;
        return null;
    }
    
    //retrieve the most recently added attraction
    public function getMostRecent() {
        $records = $this->all();
        $recent = $records[0];
        
        foreach($records as $record){
            if($record->date_added > $recent->date_added)
            {
                $recent = $record;
            }
        }
        return $recent;
    }
    
    // retrieve each categories most recently added attractions 
    public function getMostRecentAttractions() {
        // create new array of size 3 and add first 3 attractions
        $records = $this->all();
        $recentAttractions = array_slice($records, 0, 3, true);
        $recentEat = $recentAttractions[0];
        $recentSleep = $recentAttractions[1];
        $recentPlay = $recentAttractions[2];
        
        foreach($records as $record) {
            if($record->category == 'eat') {
                if($record->date_added > $recentEat->date_added) {
                    $recentAttractions[0] = $record;
                }
            }          
            if($record->category == 'sleep') {
                if($record->date_added > $recentSleep->date_added) {
                    $recentAttractions[1] = $record;
                }
            }  
            if($record->category == 'play') {
                if($record->date_added > $recentPlay->date_added) {
                    $recentAttractions[2] = $record;
                }
            }
        }
        return $recentAttractions;
    }
    
    // retrieve all of the attractions in the specified category
    public function getAllAttractionsInCategory($category) {
        $records = $this->all();
        $catAttractions = array();
                
        foreach($records as $record) {
            if($record->category == $category) {
                $catAttractions[] = $record;
            }
        }
        
        return $catAttractions;
    }
    
    function form_insert($data){
        // Inserting in Table(students) of Database(college)
        $this->db->insert('attraction_withxml', $data);
    }
    
}