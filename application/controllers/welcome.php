<?php

/**
 * 
 * controllers/welcome.php
 * 
 * Our homepage.   The homepage for the tourist website for Zurich.
 * @author Jason Roque and Sandra Buchanan
 * 
 * ------------------------------------------------------------------------
 */
class Welcome extends Application {

    function __construct() {
        parent::__construct();
    }

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    function index() {
        $this->data['title'] = 'Zurich: The Place to Be';
        $this->data['pagebody'] = 'welcome';
        $this->render();
    }

}

/* End of file welcome.php */
/* Location: application/controllers/welcome.php */