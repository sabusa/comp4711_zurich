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
    
    private $imageM;
    private $imageS1;
    private $imageS2;
    private $imageS3;
    
    function __construct() {
        parent::__construct();
    }
    
    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    function index() {
        $this->data['title'] = "Administration";
        $this->data['pagebody'] = 'admin';
      
        // retrieve and display all the pictures and captions of the attractions
        $attractions = $this->attractions_xml->all();     
        $pictures = array();
        foreach ($attractions as $record) {
            $xml = simplexml_load_string($record->xml_desc);
            $pictures[] = array('id' => $record->_id,
                                'name' => $record->name,
                                'category' => $record->category,
                                'image' => $xml->images->image, 
                                'caption' => $xml->caption);
        }
        $this->data['pictures'] = $pictures;
        
        $this->render();
    }
    
    
    // create a new attraction
    function add_new() {
        $this->data['title'] = 'Adding new post';
        $this->data['pagebody'] = 'newpost';
        
        //loading helper libraries to help with validating the form
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        
       // do we have an item in the session already {
       $session_record = $this->session->userdata('item');
        if ($session_record !== FALSE) {
            // does its item # match the requested one {
            if (isset($session_record->_id)) {
                // use the item record from the session
                $item_record = $session_record;
            }
        }
        
        $item_record = $this->attractions_xml->create();
        
        $caption = null;
        $desc = null;
        $imageMain = null;
        $imageSub1 = null;
        $imageSub2 = null;
        $imageSub3 = null;
        
        //we need to construct pretty editing fields using the formfields helper
        $this->load->helper('formfields');
        $this->data['fname'] = makeTextField('Name', 'name', $item_record->name);
        $options = array('Eat', 'Sleep', 'Play');
        $this->data['fcategory'] = makeComboField('Category', 'category', $item_record->category, $options);
        $this->data['fcaption'] = makeTextField('Caption', 'caption', $caption);
        $this->data['fdescription'] = makeTextArea('Description', 'description', $desc, 'Description here', $maxlen=5000);
        $this->data['flocation'] = makeTextField('Location', 'location', $item_record->location);
        $rangeoptions = array('$', '$$', '$$$', '$$$$', '$$$$$');
        $this->data['fpricerange'] = makeComboField('Price Range', 'price_range', $item_record->location, $rangeoptions);
        $suitabilityoptions = array('Family', 'Adventurous', 'Relaxed');
        $this->data['fsuitability'] = makeComboField('Group Suitability', 'suitability', $item_record->suitability, $suitabilityoptions);
        //$this->data['fspecifics'] = makeTextField($specificName, 'specifics', $specificValue, "Specifications of the certain type of attraction");
        $this->data['fupload1'] = makeFileUploader('Main Image', 'imageMain', 'You main image');
        $this->data['fupload2'] = makeFileUploader('Sub Image 1', 'imgSub1', 'You 1st sub image');
        $this->data['fupload3'] = makeFileUploader('Sub Image 2', 'imgSub2', 'You 2nd sub image');
        $this->data['fupload4'] = makeFileUploader('Sub Image 3', 'imgSub3', 'You 3rd sub image');
        $this->data['fsubmit'] = makeSubmitButton('SUBMIT ATTRACTION', 'Do you feel lucky?');
        
        $this->render();
    }
    
    // posting new attraction
    function post_new() {
        $fields = $this->input->post();
        
        $errors = array();
        
        if(strlen($fields['name']) < 1) {
            $errors[] = 'Please fill in name!';
        }
        
        if(strlen($fields['caption']) < 1) {
            $errors[] = 'Please fill in caption!';
        }
        
        if(strlen($fields['location']) < 1) {
            $errors[] = 'Please fill in location!';
        }
        
        if(strlen($fields['description']) < 1) {
            $errors[] = 'Please fill in description!';
        }
        
        // set default value of combo field to orginal attraction category
        $categoryValue = $fields['category'];
        if($categoryValue == 0) {
            $categoryValue = 'eat';
        }
        if($categoryValue == 1) {
            $categoryValue = 'sleep';
        }
        if($categoryValue == 2) {
            $categoryValue = 'play';
        }
        
        // set default value of combo field to orginal attraction price range
        $priceValue = $fields['price_range'];
        if($priceValue == 0) {
            $priceValue = '$';
        }
        if($priceValue == 1) {
            $priceValue = '$$';
        } 
        if($priceValue == 2) {
            $priceValue = '$$$';
        } 
        if($priceValue == 3) {
            $priceValue = '$$$$';
        } 
        if($priceValue == 4) {
            $priceValue = '$$$$$';
        } 
        
        $suitValue = $fields['suitability'];
        if($suitValue == 0) {
            $suitValue = 'Family';
        }
        if($suitValue == 1) {
            $suitValue = 'Adventurous';
        }
        if($suitValue == 2) {
            $suitValue = 'Relaxed';
        }
        
        //config files for upload, this can also be autoloaded too
        $config['upload_path'] = 'assets/images';  
        $config['allowed_types'] = 'gif|jpg|png'; 
        $config['max_size']	= '15000'; //in kilobytes
        $config['max_width']  = '5000';
        $config['max_height']  = '5000';
        $config['remove_spaces'] = true;  //substitutes spaces with underscores
        $config['overwrite'] = true; //allows overwriting of previous files
        $this->load->library('upload', $config); //load upload library '/libraries/Upload.php'
        
        $images = '';
        
        //these are the names of your upload buttons from your form
        $upload_controls = array('imageMain', 'imgSub1', 'imgSub2', 'imgSub3');
        foreach ($upload_controls as $uploadpic)
        {
            //call the codeigniter upload $uploadpic is the form upload control
            if ($this->upload->do_upload($uploadpic))
            {
                if($uploadpic == 'imageMain') {
                    $images .= '<image>/assets/images/' . $_FILES[$uploadpic]['name'] . '</image>';
                } else {
                    $images .= '<subimg>/assets/images/' . $_FILES[$uploadpic]['name'] . '</subimg>';
                }
            }
                
        } // end of foreach upload
        
        
        $xml_desc = '' . '<xml_desc>' .
                            '<caption>' . $fields['caption'] . '</caption>' .
                            '<description>' . $fields['description'] . '</description>' .
                           '<images>' .
                                $images .
                            '</images>' .
                            '<specifics>' .
                            '</specifics>' . 
                        '</xml_desc>';
        
        $xmlString = (string) $xml_desc;
        
        if(count($errors) >= 1) {
            foreach($errors as $error) {
                echo $error . '<br>';
            }
            $this->add_new();
        } else {
            echo $xmlString;
            $query = $this->db->query("INSERT INTO attraction_withxml (`category`, `name`, `location`, `price_range`, `suitability`, `xml_desc`) " .
                    'VALUES ("' . $categoryValue . '","'. $fields['name'] . '","' . $fields['location'] . '","' . $priceValue . '","' . $suitValue . '","' . $xmlString . '");');
            redirect('/admin');
        }
    }
    
     // delete an attraction
    function delete($which){
        //get attraction to delete
        $record = $this->attractions_xml->getID($which); 
        //Column names for images
        $images = array();
        //$images[] = $_POST['imageM'];
        //$images[] = $this->data['imageS1'];
        //$images[] = $this->data['imageS2'];
        //$images[] = $this->data['imageS3'];
        $filesToDelete = array();
        //get the string representation for all the images to delete
        foreach($images as $image){
            $filesToDelete[] = (string)$image;
        }
        //delete the pictures
        foreach ($filesToDelete as $delete) {
           unlink(FCPATH.$delete);
        }
        //delete the record after images were deleted
        $this->attractions_xml->delete($which);
        print_r($record);
        //redirect("/admin");
    }
    
    // present an attraction item for editing
    function edit($which) {
        $this->data['title'] = 'Edit Page';
        $this->data['pagebody'] = 'edit';
        $this->data['imageM'] = $this->imageM;
        $this->data['imageS1'] = $this->imageS1;
        $this->data['imageS2'] = $this->imageS2;
        $this->data['imageS3'] = $this->imageS3;

        // use “item” as the session key
        // assume no item record in-progress
        $item_record = null;
        $xml = null;
        // do we have an item in the session already {
       $session_record = $this->session->userdata('item');
        if ($session_record !== FALSE) {
            // does its item # match the requested one {
            if (isset($session_record->_id) && ($session_record->_id == $which)) {
                // use the item record from the session
                $item_record = $session_record;
            }
        }
        // if no item-in progress record {
        if ($item_record == null) {
            if($this->attractions_xml->exists($which)) {
                // get the item record from the items model
                $item_record = $this->attractions_xml->get($which);
            } else {
                $item_record = $this->attractions_xml->create();
                $item_record->_id = $which;
            }
            // save it as the “item” session object
            $this->session->set_userdata('item', $item_record);
        } 
        
        $xml = simplexml_load_string($item_record->xml_desc);
        
        // set default value of combo field to orginal attraction category
        $categoryValue = $item_record->category;
        $specificName = null;
        $specificValue = null;
        if($categoryValue == 'eat') {
            $categoryValue = 0;
            $specificName = 'Cuisine Style';
            $specificValue = $xml->specifics->cuisine_style;
        }
        if($categoryValue == 'sleep') {
            $categoryValue = 1;
            $specificName = 'Sleeps How Many';
            $specificValue = $xml->specifics->sleeps_how_many;
        }
        if($categoryValue == 'play') {
            $categoryValue = 2;
            $specificName = 'Family Friendly';
            $specificValue = $xml->specifics->family_friendly;
        }
        
        // set default value of combo field to orginal attraction price range
        $priceValue = $item_record->price_range;
        if($priceValue == '$') {
            $priceValue = 0;
        }
        if($priceValue == '$$') {
            $priceValue = 1;
        } 
        if($priceValue == '$$$') {
            $priceValue = 2;
        } 
        if($priceValue == '$$$$') {
            $priceValue = 3;
        } 
        if($priceValue == '$$$$$') {
            $priceValue = 4;
        } 
        
        $suitValue = $item_record->suitability;
        if($suitValue == 'Family') {
            $suitValue = 0;
        }
        if($suitValue == 'Adventurous') {
            $suitValue = 1;
        }
        if($suitValue == 'Relaxed') {
            $suitValue = 2;
        }
        
        $this->data['name'] = $item_record->name;
        
        // image data is stored as /assets/images/pictureName.jpg
        // sub string it to parse out the "/assets/images/" and only have file name
        $imgName = substr($xml->images->image, 15); 

        $images = array();
        
        foreach ($xml->images->subimg as $subimg) {
            $images[] = substr((string)$subimg, 15);
        }
        
        $this->data['id'] = $item_record->_id;
        $this->data['imageM'] = $imgName;
        $this->data['imageS1'] = $images[0];
        $this->data['imageS2'] = $images[1];
        $this->data['imageS3'] = $images[2];
        
        // merge the view parms with the current item record
        //$this->data = array_merge($this->data, $item_record);
        //we need to construct pretty editing fields using the formfields helper
        $this->load->helper('formfields');
        $this->data['fid'] = makeTextField('Attraction ID', 'id', $item_record->_id, "Attraction identifier ... cannot be changed", 10, 25, true);
        $this->data['fname'] = makeTextField('Name', 'name', $item_record->name, "Name of the attraction");
        $options = array('Eat', 'Sleep', 'Play');
        $this->data['fcategory'] = makeComboField('Category', 'category', $categoryValue, $options);
        $this->data['fcaption'] = makeTextField('Caption', 'caption', $xml->caption, "This is a short caption naming the attraction");
        $this->data['fdescription'] = makeTextArea('Description', 'description', $xml->description, "This is the description of the attraction", $maxlen=5000);
        $this->data['flocation'] = makeTextField('Location', 'location', $item_record->location, "Where in Zurich the attraction is located");
        $rangeoptions = array('$', '$$', '$$$', '$$$$', '$$$$$');
        $this->data['fpricerange'] = makeComboField('Price Range', 'price_range', $priceValue, $rangeoptions);
        $suitabilityoptions = array('Family', 'Adventurous', 'Relaxed');
        $this->data['fsuitability'] = makeComboField('Group Suitability', 'suitability', $suitValue, $suitabilityoptions);
        $this->data['fspecifics'] = makeTextField($specificName, 'specifics', $specificValue, "Specifications of the certain type of attraction");
        $this->data['fdateAdded'] = makeTextField('Date Added', 'date_added', $item_record->date_added, "YYYY-MM-DD", 10 ,25, true);
        $this->data['fimage'] = showImage('Main image for the attraction', $this->data['imageM']);
        $this->data['fupload'] = makeFileUploader('Main Image', 'imageMain', 'Pick file change main image');
        $this->data['fsubimage1'] = showImage('Supplemental image for the attraction', $this->data['imageS1']);
        $this->data['fupload1'] = makeFileUploader('Sub Image 1', 'subImg1', 'Pick file change sub image 1');
        $this->data['fsubimage2'] = showImage('Another image for the attraction', $this->data['imageS2']);
        $this->data['fupload2'] = makeFileUploader('Sub Image 2', 'subImg2', 'Pick file change sub image 2');
        $this->data['fsubimage3'] = showImage('Another image for the attraction', $this->data['imageS3']);
        $this->data['fupload3'] = makeFileUploader('Sub Image 3', 'subImg3', 'Pick file change sub image 3');
        
        // form fields to hold the current image files (hidden in the view page)
        $this->data['imgMain'] = makeTextField('', 'imageM', $this->data['imageM']);
        $this->data['imgSub1'] = makeTextField('', 'imageS1', $this->data['imageS1']);
        $this->data['imgSub2'] = makeTextField('', 'imageS2', $this->data['imageS2']);
        $this->data['imgSub3'] = makeTextField('', 'imageS3', $this->data['imageS3']);
        
        $this->data['fsubmit'] = makeSubmitButton('SUBMIT ATTRACTION', 'Do you feel lucky?');
        
        $this->render();
    }

    // handle a proposed attraction form submission
    function post($which) {
        $fields = $this->input->post(); // gives us an associative array
        
        //loading helper libraries to help with validating the form
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
       
        // test the incoming fields
        if (strlen($fields['name']) < 1) {
            $this->errors[] = 'An attraction has to have a name!';
        }
        if (strlen($fields['caption']) < 1) {
            $this->errors[] = 'An attraction has to have a caption!';
        }
        if (strlen($fields['description']) < 1) {
            $this->errors[] = 'An attraction has to have a description!';
        }
        
        switch($fields['category']) {
            case 0:
                $fields['category'] = 'eat';
            break;
            case 1:
                $fields['category'] = 'sleep';
            break;
            case 2:
                $fields['category'] = 'play';
            break;
        }
        
        switch($fields['price_range']) {
            case 0:
                $fields['price_range'] = '$';
            break;
            case 1:
                $fields['price_range'] = '$$';
            break;
            case 2:
                $fields['price_range'] = '$$$';
            break;
            case 3:
                $fields['price_range'] = '$$$$';
            break;
            case 4:
                $fields['price_range'] = '$$$$$';
            break;
        }
        
        switch($fields['suitability']) {
            case 0:
                $fields['suitability'] = 'Family';
            break;
            case 1:
                $fields['suitability'] = 'Adventurous';
            break;
            case 2:
                $fields['suitability'] = 'Relaxed';
            break;
        }
        
        //config files for upload, this can also be autoloaded too
        $config['upload_path'] = 'assets/images';  
        $config['allowed_types'] = 'gif|jpg|png'; 
        $config['max_size']	= '15000'; //in kilobytes
        $config['max_width']  = '5000';
        $config['max_height']  = '5000';
        $config['remove_spaces'] = true;  //substitutes spaces with underscores
        $config['overwrite'] = true; //allows overwriting of previous files
        $this->load->library('upload', $config); //load upload library '/libraries/Upload.php'
        
        $images = '';
        $prevMainImg = $fields['imageM'];
        $prevSubImg1 = $fields['imageS1'];
        $prevSubImg2 = $fields['imageS2'];
        $prevSubImg3 = $fields['imageS3'];
        
        $count = 0;
        //these are the names of your upload buttons from your form
        $upload_controls = array('imageMain', 'subImg1', 'subImg2', 'subImg3');
        foreach ($upload_controls as $uploadpic)
        {
            $temp = "";
            
            //call the codeigniter upload $uploadpic is the form upload control
            if (!$this->upload->do_upload($uploadpic))
            {
                //if no file is selected for upload, then add original photos
                if($temp == "") {
                    if($uploadpic == 'imageMain') {
                        $images .= '<image>/assets/images/' . $prevMainImg . '</image>';
                    } else if ($uploadpic == 'subImg1') {
                        $images .= '<subimg>/assets/images/' . $prevSubImg1 . '</subimg>';
                    } else if ($uploadpic == 'subImg2') {
                        $images .= '<subimg>/assets/images/' . $prevSubImg2 . '</subimg>';
                    } else {
                        $images .= '<subimg>/assets/images/' . $prevSubImg3 . '</subimg>';
                    }
                }
            } else {
                if($uploadpic == 'imageMain') {
                    $images .= '<image>/assets/images/' . $_FILES[$uploadpic]['name'] . '</image>';
                } else {
                    $images .= '<subimg>/assets/images/' . $_FILES[$uploadpic]['name'] . '</subimg>';
                }
            }
            $count++;    
        } // end of foreach upload
        
        
        $xml_desc = '' . '<xml_desc>' .
                            '<caption>' . $fields['caption'] . '</caption>' .
                            '<description>' . $fields['description'] . '</description>' .
                           '<images>' .
                                $images .
                            '</images>' .
                            '<specifics>' .
                            '</specifics>' . 
                        '</xml_desc>';
        
        $xmlString = (string) $xml_desc;
       

        // get the session item record
        $record = $this->session->userdata('item');
        // merge the session record into the model item record, over-riding any edited fields

        // update the session
        $this->session->set_userdata('item', $record);
        // update if ok
        if (count($this->errors) < 1) {
            // store the merged record into the model
            //$this->attractions_xml->update($record);
            // remove the item record from the session container
            $this->session->unset_userdata('item');
            
            $query = $this->db->query('UPDATE attraction_withxml SET category="'. 
                     $fields['category'] . '", name= "' . $fields['name'] . '", location= "' . 
                     $fields['location'] . '", price_range= "' . 
                     $fields['price_range'] . '", suitability= "' . 
                     $fields['suitability'] . '", xml_desc= "' . $xmlString . 
                     '" WHERE _id = ' . $which . ';');
            ;         
            redirect('/admin');
        } else {
            $this->edit($which);
        }
    }
}

/* End of file admin.php */
/* Location: application/controllers/admin.php */