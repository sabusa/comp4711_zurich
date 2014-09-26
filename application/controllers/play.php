<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Play extends Application {
    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $this->data['pagebody'] = 'justone';
        
        $record = $this->jumps->get(3);
        $this->data = array_merge($this->data, $record);
        
        $this->render();
    }
}