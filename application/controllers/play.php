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
    
    function index() {
        $this->data['pagebody'] = 'justone';
        
        $record = $this->jumps->get(3);
        $this->data = array_merge($this->data, $record);
        
        $this->render();
    }
}
/* End of file play.php */
/* Location: application/controllers/play.php */