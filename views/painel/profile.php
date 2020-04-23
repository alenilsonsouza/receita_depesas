<div class="row">
    <div class="col-sm-12">
        <h1>Perfil</h1>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="jumbotron">
            <?php if(!empty($flash)):?>
            <div class="alert alert-danger" role="alert">
                <?=$flash;?>
            </div>
            <?php endif;?>
            <h1 class="display-4"><?=$loggedUser->getName();?></h1>
            <p class="lead">
                <strong>E-mail:</strong> <?=$loggedUser->getEmail();?><br>
                <strong>Tipo:</strong> <?=$loggedUser->getTypeName();?>
            </p>
            <hr class="my-4">
            <p>Preencha o campo abaixo caso queira alterar a senha.</p>
            <form method="post" action="<?=BASE;?>painel_perfil/editPassAction">
                <div class="form-group">
                    <label for="exampleInputPassword1">Senha</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Confirmar Senha</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirm" required>
                </div>
                <input type="hidden" value="<?=$loggedUser->getId();?>" name="id">
                <input type="hidden" value="<?=$page;?>" name="page">
                <button type="submit" class="btn btn-primary">Alterar Senha</button>
            </form>
        </div>
    </div>
</div>







