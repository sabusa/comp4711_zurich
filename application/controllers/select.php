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

class Select extends Application {
    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }
    
    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------
    function index() {
        $this->data['title'] = "Selection";
        $this->data['pagebody'] = 'select';
        
        // retrieve and display all the pictures and captions of the attractions
        $attractions = $this->attractions_xml->all();     
        $pictures = array();
        foreach ($attractions as $record) {
            $pictures[] = array('id' => $record->_id,
                                'category' => $record->category
                );
        }
        $this->data['pictures'] = $pictures;
        
        $this->load->helper('formfields');
     
        //an array holding selection options for drop down menu
        $selectOptions = array("Choose Price Range:", "$", "$$", "$$$", "Choose Group Suitability:", "Adventurous", "Family", "Relaxed");

        //create the form fields
        $this->data['foptions'] = makeComboField('Select:', 'select', 'code', $selectOptions, 'Search by price range or by group suitability.', 40, 20, false);
        $this->data['fsubmit'] = makeSubmitButton('Submit', 'Submit', 'btn btn-large btn-primary');
   
        //assign defaults
        $this->data['restaurants'] = array();           
        $this->data['accommodations'] = array();
        $this->data['explore'] =  array();
        $this->data['explore_heading'] = '';
        $this->data['restaurants_heading'] = '';
        $this->data['accommodations_heading'] = '';
        
        //display
        $this->render();
    }
   
    // handle a proposed menu item form submission
    function post() {
        $this->data['pagebody'] = 'select';
   
        $fields = (array) $this->input->post(); //gives us an associative array
        //get drop down number, then get info from it
        $selectNumber = (int) $fields['select'];


        if ($selectNumber == 0 || $selectNumber == 4) {
            $this->errors[] = 'Invalid selection criteria has been chosen';
        }

        //recreate the form fields
        //an array to hold the price dropdown choices
        $selectOptions = array("Choose Price Range:", "$", "$$", "$$$", "Choose Group Suitability:", "Adventurous", "Family", "Relaxed");
        $this->load->helper('formfields');
        $this->data['foptions'] = makeComboField('Select:', 'select', $selectNumber, $selectOptions, 'Search by price range or by group suitability.', 40, 20, false);
        $this->data['fsubmit'] = makeSubmitButton('Submit', 'Submit', 'btn btn-large btn-primary');

        //find out what the criteria is
        $selectCriteria = $selectOptions[$selectNumber];

        //see which page should be displayed depending on the error count
        if (count($this->errors) < 1) {
            //displays all the categories that match the filter
            $categories = array('eat', 'sleep', 'play');
            $grouped_records = array();
            foreach ($categories as $category) {
                $single_cat = array();
                $cat_records = $this->attractions_xml->getAllAttractionsInCategory($category);
                foreach ($cat_records as $cat_record) {
                    if ($selectNumber < 4) {
                        if (strcmp($cat_record->price_range, $selectCriteria) == 0) {
                            $xml_desc = simplexml_load_string($cat_record->xml_desc);
                            $single_cat[] = array('name' => $cat_record->name,
                                                  'image' => $xml_desc->images->image,
                                                  'price' => $cat_record->price_range,
                                                  '_id' => $cat_record->_id,
                                                  'group' => $cat_record->suitability);
                        }
                    } else {
                        if (strcmp($cat_record->suitability, $selectCriteria) == 0) {
                            $xml_desc = simplexml_load_string($cat_record->xml_desc);
                            $single_cat[] = array('name' => $cat_record->name, 
                                                  'image' => $xml_desc->images->image,
                                                  'price' => $cat_record->price_range, 
                                                  '_id' => $cat_record->_id,
                                                  'group' => $cat_record->suitability);
                        }
                    }
                }
                $grouped_records[] = $single_cat;
            }
            $this->data['results'] = '';
            if (count($grouped_records[0]) > 0){
                $this->data['restaurants_heading'] = '<h3>Restaurants</h3>';
            } else {
                $this->data['restaurants_heading'] = '';
            }
            if (count($grouped_records[1]) > 0){
                $this->data['accommodations_heading'] = '<h3>Accommodations</h3>';
            } else {
                $this->data['accommodations_heading'] = '';
            }
            if (count($grouped_records[2]) > 0){
                $this->data['explore_heading'] = '<h3>Explore</h3>';
            } else {
                $this->data['explore_heading'] = '';
            }
            $this->data['restaurants'] = $grouped_records[0];
            $this->data['accommodations'] = $grouped_records[1];
            $this->data['explore'] = $grouped_records[2];
            $this->render();
        } else {
            $this->data['results'] = 'The filter you have chosen is invalid.';
            $this->data['restaurants'] = array();           
            $this->data['accommodations'] = array();
            $this->data['explore'] =  array();
            $this->data['explore_heading'] = '';
            $this->data['restaurants_heading'] = '';
            $this->data['accommodations_heading'] = '';
            $this->index();
        }
    }

}




