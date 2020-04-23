<?php
class loginController extends controller {

	private $user;

    public function __construct() {
        parent::__construct();

    }

    public function index() {
        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $siteHandler = new SiteHandler();
        $site = $siteHandler->getSite();

        $this->loadViewInPainel('login', [
            'flash'=>$flash,
            'site'=>$site
        ]);
    }

    public function signin() {
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        $userHandler = new UserHandler();
        if($userHandler->signin($email, $password)) {
            header('Location:'.BASE.'painel');
            exit;
        }else{
            $_SESSION['flash'] = 'Usuário ou senha inválidos';
        }

        header('Location:'.BASE.'login');
        exit;
    }


    public function logout(){

        $_SESSION['token'] = '';

        header("Location: ".BASE."login");
        exit;
    }
}