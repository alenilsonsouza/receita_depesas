<?php
class painel_userController extends controller {

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

        $userHandler = new UserHandler();
        $users = $userHandler->list($this->loggedUser);

        $siteHandler = new SiteHandler();
        $site = $siteHandler->getSite();
        
        $this->loadTemplateInPainel('user', [
            'page' => 'user',
            'title' => 'Usuários',
            'users' => $users,
            'site' => $site,
            'loggedUser' => $this->loggedUser
        ]);
    }

    public function add() {
        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $siteHandler = new SiteHandler();
        $site = $siteHandler->getSite();
        
        $this->loadTemplateInPainel('user_storage',[
            'page' => 'user',
            'title' => 'Adicionar Usuário',
            'flash' => $flash,
            'site' => $site,
            'loggedUser' => $this->loggedUser
        ]);
    }

    public function edit($id) {

        $userHandler = new UserHandler();
        $user = $userHandler->findById($id);

        $siteHandler = new SiteHandler();
        $site = $siteHandler->getSite();
        
        $this->loadTemplateInPainel('user_storage', [
            'page' => 'user',
            'title' => 'Editar Usuário',
            'user' => $user,
            'site' => $site,
            'loggedUser' => $this->loggedUser
        ]);
    }

    public function storageAction() {
        $id = filter_input(INPUT_POST, 'id');
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $type = filter_input(INPUT_POST, 'type');
        $password = filter_input(INPUT_POST, 'password');
        $password_confirm = filter_input(INPUT_POST, 'password_confirm');

        $user = new User();
        $userHandler = new UserHandler();
        if(!empty($id)) {
            //Atualizar Dados Usuário
            $user->setId($id);
            $user->setName($name);
            $user->setEmail($email);
            $user->setType($type);
            $userHandler->updateById($user);
            
        }else {
            if($password === $password_confirm){
                $hash = password_hash($password, PASSWORD_DEFAULT);
                //Inserir Dados Usuário
                if(!$userHandler->verifyExists($email)){
                    $user->setName($name);
                    $user->setEmail($email);
                    $user->setType($type);
                    $user->setPassword($hash);
                    $userHandler->add($user);
                }else{
                    $_SESSION['flash'] = "E-mail já cadastrado no sistema";  
                    header('Location:'.BASE.'painel_user/add');
                    exit;
                }
            }else{
                $_SESSION['flash'] = "Senhas não conferem";
                header('Location:'.BASE.'painel_user/add');
                exit;
            }   
        }
        header('Location:'.BASE.'painel_user');
        exit;
    }

    public function editPassword($id) {
        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $userHandler = new UserHandler();
        $user = $userHandler->findById($id);

        $siteHandler = new SiteHandler();
        $site = $siteHandler->getSite();

        $this->loadTemplateInPainel('user_editPassword', [
            'page' => 'user',
            'title' => 'Trocar Senha de '.$user->getName(),
            'user' => $user,
            'flash' => $flash,
            'site' => $site,
            'loggedUser' => $this->loggedUser
        ]);
    }

    public function editPasswordAction() {
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

        header('Location:'.BASE.'painel_user/editPassword/'.$id);
        exit;
    }

    public function del($id) {

        $userHandler = new UserHandler();
        $userHandler->deleteById($id);

        header('Location:'.BASE.'painel_user');
        exit;
    }
}