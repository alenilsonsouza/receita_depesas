<?php
class homeController extends controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        header('Location:'.BASE.'painel');
        exit;
       
        $siteHandler = new SiteHandler();
        $site = $siteHandler->getSite();

        $this->loadTemplate('home', [
            'site' => $site
        ]);
    }

}