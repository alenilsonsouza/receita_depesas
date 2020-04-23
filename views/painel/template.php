<?php require 'partials/doctype.php';?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <a href="" style="margin:10px 0; display:inline-block">
                <div class="text-center">
                    <img src="<?=BASE_IMAGES;?>final_marca_orbita.png" class="img-fluid" alt="Logo">
                </div>
            </a>
            <p>Olá <?=$viewData['loggedUser']->getName();?></p>
            <div class="list-group" style="margin-top:10px;">
                <a href="<?=BASE;?>painel" class="list-group-item list-group-item-action <?=($viewData['page'] == 'dashboard'?'active':'');?>">Dashboard</a>
                <a href="<?=BASE;?>painel_perfil" class="list-group-item list-group-item-action <?=($viewData['page'] == 'perfil'?'active':'');?>">Perfil</a>
                <a href="<?=BASE;?>painel_movimentacao" class="list-group-item list-group-item-action <?=($viewData['page'] == 'moviment'?'active':'');?>">Movimentação</a>

                
                <a href="<?=BASE;?>painel_user" class="list-group-item list-group-item-action <?=($viewData['page'] == 'user'?'active':'');?>">Usuários</a>
                <a href="<?=BASE;?>login/logout" class="list-group-item list-group-item-action">Sair</a>
            </div>

        </div>
        <div class="col-10">
            <?php $this->loadViewInPainel($viewName, $viewData); ?>
        </div>
    </div>
</div>
<?php require 'partials/footer.php';?>