<?php
class painelController extends controller {

	private $loggedUser;

    public function __construct() {
        parent::__construct();

        $userHandler = new UserHandler();
        $this->loggedUser = $userHandler->checkLogin(); 
        if($this->loggedUser === false) {
            header('Location:'.BASE.'login');
            exit;
        }
    }

    public function index() {

        $siteHandler = new SiteHandler();
        $site = $siteHandler->getSite();
        
        $this->loadTemplateInPainel('panel',[
            'page' => 'dashboard',
            'site' => $site,
            'loggedUser' => $this->loggedUser
        ]);
    }
}