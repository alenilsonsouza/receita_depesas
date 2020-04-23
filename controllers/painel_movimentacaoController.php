<?php
class painel_movimentacaoController extends controller {

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

        $date = new Date();
        $m = [];
        for($q=1;$q<=12;$q++) {
            $m[] = $date->getMonth($q);
        }

        $months = $m;
        
        $this->loadTemplateInPainel('moviment',[
            'page' => 'moviment',
            'site' => $site,
            'months' => $months,
            'loggedUser' => $this->loggedUser
        ]);
    }
}