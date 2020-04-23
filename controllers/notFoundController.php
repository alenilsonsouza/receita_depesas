<?php
class notFoundController extends controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
        
        $this->loadView('404');
    }

}