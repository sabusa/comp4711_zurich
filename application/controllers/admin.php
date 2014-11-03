<?php
     
/**
 * controllers/admin.php
 * 
 * The administration page that gives Admnistration full view of all attractions
 * 
 * @author Jason Roque and Sandra Buchanan
 * 
 * ------------------------------------------------------------------------
 */

class Admin extends Application {
    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }
    
    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    function index() {
        $this->data['title'] = "Administration";
        $this->data['pagebody'] = 'admin';
      
        // retrieve and display all the pictures and captions of the attractions
        $attractions = $this->attractions->all();     
        $pictures = array();
        foreach ($attractions as $record) {
            $pictures[] = array('id' => $record->id,
                                'category' => $record->category,
                                'image' => $record->image, 
                                'href' => $record->link,
                                'caption' => $record->caption);
        }
        $this->data['pictures'] = $pictures;
        
        $this->render();
    }
    
     // present an attraction item for editing
    function edit($which) {
        $this->data['title'] = 'Edit Page';
        $this->data['pagebody'] = 'edit';

        // use “item” as the session key
        // assume no item record in-progress
        $item_record = null;
        // do we have an item in the session already {
        $session_record = $this->session->userdata('item');
        if ($session_record !== FALSE) {
            // does its item # match the requested one {
            if (isset($session_record['id']) && ($session_record['id'] == $which)) {
                // use the item record from the session
                $item_record = $session_record;
            }
        }
        // if no item-in progress record {
        if ($item_record == null) {
            // get the item record from the items model
            $item_record = (array) $this->attractions->get($which);
            // save it as the “item” session object
            $this->session->set_userdata('item', $item_record);
        }

        // merge the view parms with the current item record
//        $this->data = array_merge($this->data, $item_record);
        // we need to construct pretty editing fields using the formfields helper
        $this->load->helper('formfields');
        $this->data['fid'] = makeTextField('Attraction Id', 'id', $item_record['id'], "item identifier ... cannot be changed", 10, 25, true);
        $options = array('Eat', 'Sleep', 'Play');
        $this->data['fcategory'] = makeComboField('Category', 'category', $item_record['category'], $options);
        $this->data['fcaption'] = makeTextField('Caption', 'caption', $item_record['caption'], "This is a short caption naming the attraction");
        $this->data['fdescription'] = makeTextArea('Description', 'description', $item_record['description'], "This is the description of the attraction");
        $this->data['flocation'] = makeTextField('Location', 'location', $item_record['location'], "Where in Zurich the attraction is located");
        $this->data['fprice'] = makeTextField('Price', 'price', $item_record['price']);
        $this->data['fdateAdded'] = makeTextField('Date Added', 'dateAdded', $item_record['dateAdded'], "YYYY-MM-DD");
        $this->data['fimage'] = showImage('Main image for the attraction', $item_record['image']);
        $this->data['fsubimage1'] = showImage('Supplemental image for the attraction', $item_record['subimg1']);
        $this->data['fsubimage2'] = showImage('Another image for the attraction', $item_record['subimg2']);
        $this->data['fsubimage3'] = showImage('Another image for the attraction', $item_record['subimg3']);
        $this->data['fsubmit'] = makeSubmitButton('Post Changes', 'Do you feel lucky?');
        $this->render();
    }

    // handle a proposed attraction form submission
    function post($which) {
        $fields = $this->input->post(); // gives us an associative array
        // test the incoming fields
        if (strlen($fields['caption']) < 1)
            $this->errors[] = 'An attraction has to have a caption!';
        if (strlen($fields['description']) < 1)
            $this->errors[] = 'An attraction has to have a description!';
        if (!is_numeric($fields['price']))
            $this->errors[] = "An attraction's price has to be numeric!";
       

        // get the session item record
        $record = $this->session->userdata('item');
        // merge the session record into the model item record, over-riding any edited fields
        $record = array_merge($record, $fields);
        // update the session
        $this->session->set_userdata('item', $record);
        // update if ok
        if (count($this->errors) < 1) {
            // store the merged record into the model
            $this->attractions->update($record);
            // remove the item record from the session container
            $this->session->unset_userdata('item');
            redirect('/admin');
        } else {
            $this->edit($which);
        }
    }
}

/* End of file admin.php */
/* Location: application/controllers/admin.php */