<?php

/**
 * controllers/about.php
 * 
 * The sleep page extends Application and presents Hotels and Resorts in Zurich.
 * 
 * @author Jason Roque and Sandra Buchanan
 * 
 * ------------------------------------------------------------------------
 */

class Admin extends Application {
    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $this->data['title'] = "Administration";
        $this->data['pagebody'] = 'admin';
        
        $source = $this->attractions->all();
        $pictures = array();
        foreach ($source as $record) {
            $pictures[] = array('category' => $record['category'],
                                'image' => $record['image'], 
                                'href' => $record['where'],
                                'caption' => $record['caption']);
        }
        $this->data['pictures'] = $pictures;
        
        $this->render();
    }
}

/* End of file abour.php */
/* Location: application/controllers/about.php */