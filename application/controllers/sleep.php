<?php

/**
 * 
 * controllers/sleep.php
 * 
 * The sleep page extends Application and presents Hotels and Resorts in Zurich.
 * 
 * @author Jason Roque and Sandra Buchanan
 * 
 * ------------------------------------------------------------------------
 */

class Sleep extends Application {
    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $this->data['title'] = "Sleep in Zurich";
        $this->data['pagebody'] = 'category';
        
        $source = $this->attractions->getAllAttractionsInCategory('sleep');
        $pictures = array();
        foreach ($source as $record) {
            $pictures[] = array('category' => $record['category'],
                                'image' => $record['image'], 
                                'href' => $record['link'],
                                'caption' => $record['caption']);
        }
        $this->data['pictures'] = $pictures;
        
        $this->render();
    }
    
    function one($id) {
        $this->data['pagebody'] = 'justone';
        
        $product = $this->attractions->get($id);
        $this->data = array_merge($this->data, $product);
        
        $this->render();
    }
}

/* End of file sleep.php */
/* Location: application/controllers/sleep.php */

