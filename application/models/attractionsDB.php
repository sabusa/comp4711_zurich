<?php

/**
 * Data access wrapper for "orders" table.
 *
 * @author jim
 */
class AttractionsDB extends MY_Model {

    // constructor
    function __construct() {
        parent::__construct('attraction', '_id');
    }

    // retrieve the most recently added attraction
    public function getMostRecent() {
        $records = $this->all();
        $recent = $records[0];
        
        foreach($records as $record){
            if($record['dateAdded'] > $recent['dateAdded'])
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
