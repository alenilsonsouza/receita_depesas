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
        if(!isset($_SESSION['date'])) {
            $date = [
                'month' => date('m'),
                'year' => date('Y')
            ];
            $_SESSION['date'] = $date;
        }
        $month = $_SESSION['date']['month'];
        $year = $_SESSION['date']['year'];

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

    public function storageAddAction() {
        $name = filter_input(INPUT_POST, 'name');
        $price = filter_input(INPUT_POST, 'price');
        $desccount = filter_input(INPUT_POST, 'desccount');
        $addition = filter_input(INPUT_POST, 'addition');
        $due_date = filter_input(INPUT_POST, 'due_date');
        $type = filter_input(INPUT_POST, 'type');

        if($name && $price) {

            $newMoviment = new Movement();
            $price = $newMoviment->parseFloat($price);
            $desccount = $newMoviment->parseFloat($desccount);
            $addition = $newMoviment->parseFloat($addition);
            $due_date = explode('/',$due_date);
            $date = $due_date[2].'-'.$due_date[1].'-'.$due_date[0]; 

            $newMoviment->setInstallmentId(0);
            $newMoviment->setName($name);
            $newMoviment->setPrice($price);
            $newMoviment->setDesccount($desccount);
            $newMoviment->setAddition($addition);
            $newMoviment->setDueDate($date);
            $newMoviment->setType($type);

            $movimentHandler = new MovementHandler();
            $movimentHandler->insert($newMoviment);

        }

        header('Location:'.BASE.'painel_movimentacao');
        exit;
    }

    public function storageEditAction() {
        $name = filter_input(INPUT_POST, 'name');
        $price = filter_input(INPUT_POST, 'price');
        $desccount = filter_input(INPUT_POST, 'desccount');
        $addition = filter_input(INPUT_POST, 'addition');
        $due_date = filter_input(INPUT_POST, 'due_date');
        $type = filter_input(INPUT_POST, 'type');
        $id = filter_input(INPUT_POST, 'id');

        if($name && $price) {

            $newMoviment = new Movement();
            $price = $newMoviment->parseFloat($price);
            $desccount = $newMoviment->parseFloat($desccount);
            $addition = $newMoviment->parseFloat($addition);
            $due_date = explode('/',$due_date);
            $date = $due_date[2].'-'.$due_date[1].'-'.$due_date[0]; 

            $newMoviment->setInstallmentId(0);
            $newMoviment->setName($name);
            $newMoviment->setPrice($price);
            $newMoviment->setDesccount($desccount);
            $newMoviment->setAddition($addition);
            $newMoviment->setDueDate($date);
            $newMoviment->setType($type);
            $newMoviment->setId($id);

            $movimentHandler = new MovementHandler();
            $movimentHandler->update($newMoviment);

        }

        header('Location:'.BASE.'painel_movimentacao');
        exit;
    }

    public function storageConsolidar() {
        $payment_date = filter_input(INPUT_POST, 'payment_date');
        $id = filter_input(INPUT_POST, 'id');

        if($payment_date && $id) {
            $newMoviment = new Movement();
            $newMoviment->setPaymentDate($payment_date);
            $newMoviment->setId($id);

            $movimentHandler = new MovementHandler();
            $movimentHandler->consolidar($newMoviment);
        }

        header('Location:'.BASE.'painel_movimentacao');
        exit;
    }

    public function delAction($id) {

        $movimentHandler = new MovementHandler();
        $movimentHandler->delById($id);
        header('Location:'.BASE.'painel_movimentacao');
        exit;
    }
}