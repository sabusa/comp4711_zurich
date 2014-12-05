<<<<<<< HEAD
<?php

/**
 * Data access wrapper for "attractions" table.
 *
 * @author jim
 */
class Attractions extends MY_Model {

    // constructor
    function __construct() {
        parent::__construct('attraction', 'id');
    }
    
        // retrieve the most recently added attraction
    public function getMostRecent() {
        $records = $this->all();
        $recent = $records[0];
        
        foreach($records as $record){
            if($record->dateAdded> $recent->dateAdded)
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
                if($record->dateAdded > $recentEat->dateAdded) {
                    $recentAttractions[0] = $record;
                }
            }          
            if($record->category == 'sleep') {
                if($record->dateAdded > $recentSleep->dateAdded) {
                    $recentAttractions[1] = $record;
                }
            }  
            if($record->category == 'play') {
                if($record->dateAdded > $recentPlay->dateAdded) {
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
        $this->db->insert('attraction', $data);
    }
=======
<?php

/**
 * Data access wrapper for "attractions" table.
 *
 * @author jim
 */
class Attractions extends MY_Model {

    // constructor
    function __construct() {
        parent::__construct('attraction', 'id');
    }
    
        // retrieve the most recently added attraction
    public function getMostRecent() {
        $records = $this->all();
        $recent = $records[0];
        
        foreach($records as $record){
            if($record->dateAdded> $recent->dateAdded)
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
                if($record->dateAdded > $recentEat->dateAdded) {
                    $recentAttractions[0] = $record;
                }
            }          
            if($record->category == 'sleep') {
                if($record->dateAdded > $recentSleep->dateAdded) {
                    $recentAttractions[1] = $record;
                }
            }  
            if($record->category == 'play') {
                if($record->dateAdded > $recentPlay->dateAdded) {
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
>>>>>>> c314c95e98ced00e19e81c6124676bc8f04dff0b
}