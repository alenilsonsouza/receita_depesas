<?php
class painel_perfilController extends controller {

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
        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $siteHandler = new SiteHandler();
        $site = $siteHandler->getSite();
        
        $this->loadTemplateInPainel('profile',[
            'page' => 'perfil',
            'flash' => $flash,
            'site' => $site,
            'loggedUser' => $this->loggedUser
        ]);
    }

    public function editPassAction() {
        $id = filter_input(INPUT_POST, 'id');
        $password = filter_input(INPUT_POST, 'password');
        $password_confirm = filter_input(INPUT_POST, 'password_confirm');

        $user = new User();
        $userHandler = new UserHandler();
        if($password == $password_confirm) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $user->setId($id);
            $user->setPassword($hash);
            $userHandler->updatePassById($user);
            $_SESSION['flash'] = "Senha alterada!";
        }else{
            $_SESSION['flash'] = "Senhas não confirmam";
        }

        header('Location:'.BASE.'painel_perfil');
        exit;
    }
}