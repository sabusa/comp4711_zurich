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
    
    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    
    function index() {
        $this->data['title'] = "Sleep in Zurich";
        $this->data['pagebody'] = 'category';
        
        $source = $this->attractions_xml->getAllAttractionsInCategory('sleep');
        $pictures = array();
        foreach ($source as $record) {
            $xml_desc = simplexml_load_string($record->xml_desc);
            $link = $record->category . '/' . $record->_id; 
            $pictures[] = array('category' => $record->category,
                                'image' => $xml_desc->images->image, 
                                'href' => $record->category . '/' . $record->_id ,
                                'caption' => $record->name . ': ' . $xml_desc->caption);
        }
        $this->data['pictures'] = $pictures;
        
        $this->render();
    }
    
    function one($id) {
        $this->data['pagebody'] = 'justone';
        
        $source = $this->attractions_xml->getID($id);
        
        //reads the mySQL blob and reads it as a simple xml string
        $xml = simplexml_load_string($source->xml_desc);
        
        $images = array();
        
        foreach ($xml->images->subimg as $subimg) {
            $images[] = (string)$subimg;
        }
        
        $this->data['category'] = $source->category;
        $this->data['caption'] = $source->name . ': ' . $xml->caption;
        $this->data['href'] = $source->category . '/' . $source->_id;
        $this->data['image'] = $xml->images->image;
        $this->data['subimg1'] = $images[0];
        $this->data['subimg2'] = $images[1];
        $this->data['subimg3'] = $images[2];
        $this->data['description'] = $xml->description;
        $this->data['price_range'] = $source->price_range;
        $this->data['suitability'] = $source->suitability;
        $this->data['location'] = $source->location;
        $this->data['dateadded'] = $source->date_added;
        $this->data['specifics'] = '<b>Sleeps How Many: </b>' . $xml->specifics->sleeps_how_many;
                
        $this->render();
    }
}

/* End of file sleep.php */
/* Location: application/controllers/sleep.php */