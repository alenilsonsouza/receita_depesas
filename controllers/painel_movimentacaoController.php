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
        //Pega todos os meses
        $m = [];
        for($q=1;$q<=12;$q++) {
            $m[] = $date->getMonth($q);
        }
        $months = $m;

        //Pegar 5 anos para tras e para frente
        $ano = date('Y');
        $anoInitial = $ano - 5;
        $totalAnos = $anoInitial + 11;

        for($q=$anoInitial;$q<$totalAnos;$q++) {
            $a[] = $q;
        }
        $years = $a;

        //Pega o mes e ano atual
        $month = date('m');
        $year = date('Y');

        $this->loadTemplateInPainel('moviment',[
            'page' => 'moviment',
            'site' => $site,
            'months' => $months,
            'years' => $years,
            'month'=> $month,
            'year' => $year,
            'loggedUser' => $this->loggedUser
        ]);
    }
}