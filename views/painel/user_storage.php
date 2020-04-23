<div class="row">
    <div class="col-sm-12">
        <h1><?=$title;?></h1>
        <a href="<?=BASE;?>painel_user" class="btn btn-primary">Voltar</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <?php if(!empty($flash)):?>
        <div class="alert alert-danger" role="alert">
            <?=$flash;?>
        </div>
        <?php endif;?>
        <form action="<?=BASE;?>painel_user/storageAction" method="POST">
            <div class="form-group">
                <label for="name">Nome de Usuário</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" name="name" required value="<?=(isset($user))?$user->getName():'';?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Digite um e-mail</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required  value="<?=(isset($user))?$user->getEmail():'';?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Tipo de Conta</label>
                <select class="form-control" name="type">
                    <?php if($loggedUser->getType() == 1):?>
                        <option value="1" <?=(isset($user) && $user->getType() == 1)?'selected':'';?>>Desenvolvedor</option>
                        <option value="2" <?=(isset($user) && $user->getType() == 2)?'selected':'';?>>Administrador</option>
                        <option value="3" <?=(isset($user) && $user->getType() == 3)?'selected':'';?>>Usuário</option>
                    <?php elseif($loggedUser->getType() == 2):?>
                        <option value="2" <?=(isset($user) && $user->getType() == 2)?'selected':'';?>>Administrador</option>
                        <option value="3" <?=(isset($user) && $user->getType() == 3)?'selected':'';?>>Usuário</option>
                    <?php else:?>
                        <option value="3" <?=(isset($user) && $user->getType() == 3)?'selected':'';?>>Usuário</option>
                    <?php endif;?>
                </select>
            </div>
            <?php if(!isset($user)):?>
                <div class="form-group">
                    <label for="exampleInputPassword1">Escolha uma senha</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword2">Confirma a sua senha</label>
                    <input type="password" class="form-control" id="exampleInputPassword2" name="password_confirm" required>
                </div>
            <?php endif;?>
            <input type="hidden" value="<?=(isset($user))?$user->getId():'';?>" name="id">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>