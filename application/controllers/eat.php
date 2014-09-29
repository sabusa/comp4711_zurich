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
        $this->data['pagebody'] = 'justone';
        
        $record = $this->jumps->first();
        $this->data = array_merge($this->data, $record);
        
        $this->render();
    }
}

/* End of file eat.php */
/* Location: application/controllers/eat.php */