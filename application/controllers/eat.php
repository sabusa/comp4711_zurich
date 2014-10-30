<?php

/**
 * 
 * controllers/eat.php
 * 
 * The eat page extends Application and presents restaurants and eateries
 * in Zurich.
 * 
 * @author Jason Roque and Sandra Buchanan
 * 
 * ------------------------------------------------------------------------
 */

class Eat extends Application {
    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $this->data['title'] = 'Eat in Zurich';
        $this->data['pagebody'] = 'category';
        
        // build the list of pages...
        $source = $this->attractions->getAllAttractionsInCategory('Eat');
        $pictures = array();
        foreach ($source as $record) {
            $pictures[] = array('category' => $record['category'],
                                'image' => $record['image'], 
                                'href' => $record['where'],
                                'caption' => $record['caption']);
        }
        $this->data['pictures'] = $pictures;
        
        $this->render();
    }
    
    function one($id) {
        $this->data['pagebody'] = 'justone';
        
        $product = $this->attractions->get($id);
        $this->data = array_merge($this->data, $product);
        
//        $sub = $this->attractions->getAllSubImages();
//        $subpics = array();
//        foreach ($sub as $record) {
//            $subpics[] = array('category' => $record['category'],
//                                'subimg1' => $record['subimg1'], 
//                                'subimg2' => $record['subimg2'], 
//                                'subimg3' => $record['subimg3'], 
//                                'caption' => $record['caption']);
//        }
//        $this->data['subpics'] = $subpics;
        
        $this->render();
    }
}

/* End of file eat.php */
/* Location: application/controllers/eat.php */
