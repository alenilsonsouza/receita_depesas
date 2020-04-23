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
        <form action="<?=BASE;?>painel_user/editPasswordAction" method="POST">
                
            <div class="form-group">
                <label for="exampleInputPassword1">Escolha uma nova senha</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword2">Confirma a nova senha</label>
                <input type="password" class="form-control" id="exampleInputPassword2" name="password_confirm" required>
            </div>
            
            <input type="hidden" value="<?=(isset($user))?$user->getId():'';?>" name="id">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>