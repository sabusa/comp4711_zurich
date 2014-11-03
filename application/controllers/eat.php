<?php

/**
 * 
 * controllers/eat.php
 * 
 * The eat page extends Application and presents restaurants and eateries
 * in Zurich.
 * 
 * @author Jason Roque and Sandra Buchanan
 * 
 * ------------------------------------------------------------------------
 */

class Eat extends Application {
    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $this->data['title'] = 'Eat in Zurich';
        $this->data['pagebody'] = 'category';
        
        // build the list of pages...
        $source = $this->attractions->getAllAttractionsInCategory('eat');
        $pictures = array();
        foreach ($source as $record) {
            $pictures[] = array('category' => $record->category,
                                'image' => $record->image, 
                                'href' => $record->link,
                                'caption' => $record->caption);
        }
        $this->data['pictures'] = $pictures;
        
        $this->render();
    }
    
    function one($id) {
        $this->data['pagebody'] = 'justone';
        
        $product = (array) $this->attractions->get($id);        
        $this->data = array_merge($this->data, $product);
               
        $this->render();
    }
}

/* End of file eat.php */
/* Location: application/controllers/eat.php */
