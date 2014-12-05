<?php

/**
 * 
 * controllers/filter.php
 * 
 * The filter page extends Application and where the user can select attractions by price &
 * group suitability, regardless of category. The results should be presented
 * grouped by category
 * 
 * @author Jason Roque and Sandra Buchanan
 * 
 * ------------------------------------------------------------------------
 */

class Filter extends Application {
    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }
    
    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------
    function index() {
        $this->data['title'] = "Filtering";
        $this->data['pagebody'] = 'filter';
        
        // retrieve and display all the pictures and captions of the attractions
        $attractions = $this->attractions_xml->all();     
        $pictures = array();
        foreach ($attractions as $record) {
            $pictures[] = array('id' => $record->_id,
                                'category' => $record->category
                );
        }
        $this->data['pictures'] = $pictures;
        
        $this->render();
    }
}