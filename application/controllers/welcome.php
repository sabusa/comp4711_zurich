<?php

/**
 * Our homepage.
 * 
 * controllers/welcome.php
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
        $this->data['pagebody'] = 'homepage';
        
        // build the list of pages...
        $source = $this->jumps->all();
        $pictures = array();
        foreach ($source as $record) {
            $picture[] = array('who' => $record['who'],'mug' => $record['mug'], 'href' => $record['where']);
        }
        $this->data['pictures'] = $pictures;
        $this->render();
    }

}

/* End of file welcome.php */
/* Location: application/controllers/welcome.php */