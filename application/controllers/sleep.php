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
        $this->data['pagebody'] = 'justone';
        
        $record = $this->jumps->get(2);
        $this->data = array_merge($this->data, $record);
        
        $this->render();
    }
}

/* End of file sleep.php */
/* Location: application/controllers/sleep.php */

