<?php

/**
 * 
 * controllers/play.php
 * 
 * The play page extends Application and presents activities  and attractions
 * in Zurich.
 * 
 * @author Jason Roque and Sandra Buchanan
 * 
 * ------------------------------------------------------------------------
 */

class Play extends Application {
    function __construct() {
        parent::__construct();
    }
    
    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------
    
    function index() {
        $this->data['title'] = 'Play in Zurich';
        $this->data['pagebody'] = 'category';
        
        $source = $this->attractions->getAllAttractionsInCategory('play');
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
/* End of file play.php */
/* Location: application/controllers/play.php */
