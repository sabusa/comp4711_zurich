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
        $source = $this->attractions_xml->getMostRecentAttractions();
        
        $pictures = array();
        foreach ($source as $record) {
            $xml_desc = simplexml_load_string($record->xml_desc);
            $pictures[] = array('category' => $record->category,'image' => $xml_desc->images->image, 'href' => $record->category);
        }
        $this->data['pictures'] = $pictures;
        
        //get the most recent article and display
        $most_recent = $this->attractions_xml->getMostRecent();
        
        //reads the mySQL blob and reads it as a simple xml string
        $xml = simplexml_load_string($most_recent->xml_desc);
        
        $this->data['n_category'] = $most_recent->category;
        $this->data['n_caption'] = $most_recent->name . ': ' . $xml->caption;
        $this->data['n_href'] = $most_recent->category . '/' . $most_recent->_id;
        $this->data['n_image'] = $xml->images->image;
        $this->data['n_description'] = $xml->description;
        $this->data['n_pricerange'] = $most_recent->price_range;
        $this->data['n_suitability'] = $most_recent->suitability;
        $this->data['n_location'] = $most_recent->location;
        $this->data['n_dateadded'] = $most_recent->date_added;
        
        $this->render();
    }

}

/* End of file welcome.php */
/* Location: application/controllers/welcome.php */