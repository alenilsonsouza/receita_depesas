<?php
class ajaxController extends controller {

	private $user;

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $dados = array();	
    }

    public function consultar_cep(){

        $cep = $_POST['cep'];
 
        $reg = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" . $cep);
         
        $dados['sucesso'] = (string) $reg->resultado;
        $dados['rua']     = (string) $reg->tipo_logradouro . ' ' . $reg->logradouro;
        $dados['bairro']  = (string) $reg->bairro;
        $dados['cidade']  = (string) $reg->cidade;
        $dados['estado']  = (string) $reg->uf;
         
        echo json_encode($dados);
    }

    public function listMoviment() {
        
        $month = date('m');
        $year = date('Y');


        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $content = file_get_contents("php://input");
            $array = json_decode($content, true);
            $month = $array['month'];
            $year = $array['year'];
            
        }

        $moviment = new MovementHandler(); 
        $total = $moviment->getTotal($month, $year);
        /*$paginas = ceil($total/$limit);
        $paginaAtual = $page;
        $offset = ($paginaAtual * $limit) - $limit;*/
        $moviments = $moviment->getList($month, $year);
        $desccontTotal = $moviment->getTotalDesccount($month, $year);
        $desccontTotalPaid = $moviment->getTotalDesccount($month, $year,2);
        $desccontTotalNoPaid = $moviment->getTotalDesccount($month, $year,1);
        $additionTotal = $moviment->getTotalAddition($month, $year);
        $additionTotalPaid = $moviment->getTotalAddition($month, $year,2);
        $additionTotalNoPaid = $moviment->getTotalAddition($month, $year,1);
        $recipesTotal = $moviment->getTotalRecipes($month, $year);
        $recipesTotalPaid = $moviment->getTotalRecipes($month, $year,2);
        $recipesTotalNoPaid = $moviment->getTotalRecipes($month, $year,1);
        $expensesTotal = $moviment->getTotalExpenses($month, $year);
        $expensesTotalPaid = $moviment->getTotalExpenses($month, $year,2);
        $expensesTotalNoPaid = $moviment->getTotalExpenses($month, $year,1);

        $date = new Date();
        $currentMonth = $date->getMonth($month);

        $m = [];
        for($q=1;$q<=12;$q++) {
            $m[] = $date->getMonth($q);
        }

        $months = $m;

        $this->loadViewInPainel('listMoviment', [
            'moviments' => $moviments,
            'month' => $month,
            'year' => $year,
            'currentMonth' => $currentMonth,
            'desccountTotal' => $desccontTotal,
            'desccountTotalPaid' => $desccontTotalPaid,
            'desccountTotalNoPaid' => $desccontTotalNoPaid,
            'additionTotal' => $additionTotal,
            'additionTotalPaid' => $additionTotalPaid,
            'additionTotalNoPaid' => $additionTotalNoPaid,
            'recipesTotal' => $recipesTotal,
            'recipesTotalPaid' => $recipesTotalPaid,
            'recipesTotalNoPaid' => $recipesTotalNoPaid,
            'expensesTotal' => $expensesTotal,
            'expensesTotalPaid' => $expensesTotalPaid,
            'expensesTotalNoPaid' => $expensesTotalNoPaid,
            'months' => $months
        ]);
    }

}