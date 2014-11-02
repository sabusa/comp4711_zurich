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
    //  The Home page
    //-------------------------------------------------------------

    function index() {
        $this->data['title'] = 'Welcome to Zurich!';
        $this->data['pagebody'] = 'homepage';
        
        // build the list of pages...
        $source = $this->attractions->getMostRecentAttractions();
        $pictures = array();
        foreach ($source as $record) {
            $pictures[] = array('category' => $record['category'],'image' => $record['image'], 'href' => $record['link']);
        }
        $this->data['pictures'] = $pictures;
        
        //get the most recent article and display
        $most_recent = $this->attractions->getMostRecent();
        $this->data['n_category'] = $most_recent['category'];
        $this->data['n_caption'] = $most_recent['caption'];
        $this->data['n_href'] = $most_recent['link'];
        $this->data['n_image'] = $most_recent['image'];
        $this->data['n_description'] = $most_recent['description'];
        
        $this->render();
    }

}

/* End of file welcome.php */
/* Location: application/controllers/welcome.php */