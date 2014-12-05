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

class About extends Application {
    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $this->data['title'] = "About the Makers...";
        $this->data['pagebody'] = 'about';
        
        $this->render();
    }
}

/* End of file abour.php */
/* Location: application/controllers/about.php */