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
    
    function index() {
        $this->data['title'] = "Administration";
        $this->data['pagebody'] = 'admin';
        
        
        $attractions = $this->attractions->all();     
        $pictures = array();
        foreach ($attractions as $record) {
            $pictures[] = array('category' => $record['category'],
                                'image' => $record['image'], 
                                'href' => $record['link'],
                                'caption' => $record['caption']);
        }
        $this->data['pictures'] = $pictures;
        
        $this->render();
    }
}

/* End of file admin.php */
/* Location: application/controllers/admin.php */