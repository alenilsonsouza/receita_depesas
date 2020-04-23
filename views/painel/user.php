<div class="row">
    <div class="col-sm-12">
        <h1><?=$title;?></h1>
        <a href="<?=BASE;?>painel_user/add" class="btn btn-primary">Adicionar</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">Usuário</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user):?>
                <tr>
                    <td><?=$user->getName();?></td>
                    <td><?=$user->getEmail();?></td>
                    <td><?=$user->getTypeName();?></td>
                    <td>
                        <a href="<?=BASE;?>painel_user/editPassword/<?=$user->getId();?>" class="btn btn-primary">Trocar Senha</a>
                        <a href="<?=BASE;?>painel_user/edit/<?=$user->getId();?>" class="btn btn-primary">Editar</a>
                        <a href="<?=BASE;?>painel_user/del/<?=$user->getId();?>" class="btn btn-primary" onClick="return confirm('Deseja realmente excluir?');">Excluir</a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>