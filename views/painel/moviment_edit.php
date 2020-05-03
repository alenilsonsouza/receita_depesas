<div class="row">
    <div class="col-sm-12">
        <h1>Movimentação</h1>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <form class="form-inline" action="<?=BASE;?>painel_movimentacao/storageEditAction" method="post">
            <div class="form-group mb-2">
                <label for="staticEmail2" class="sr-only">Email</label>
                <input type="text" class="form-control" id="name" placeholder="Nome" name="name" required value="<?=$moviment->getName();?>">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="inputPassword2" class="sr-only">Valor</label>
                <input type="tel" class="form-control" id="price" placeholder="Valor" name="price" required value="<?=number_format($moviment->getPrice(),2,',','.');?>">
            </div>
            <div class="form-group mb-2">
                <label for="inputPassword2" class="sr-only">Desconto</label>
                <input type="tel" class="form-control" id="desccount" placeholder="Desconto" name="desccount" value="<?=number_format($moviment->getDesccount(),2,",",'.');?>">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="inputPassword2" class="sr-only">Acréscimo</label>
                <input type="tel" class="form-control" id="addition" placeholder="Acréscimo" name="addition" value="<?=number_format($moviment->getAddition(),2,',','.');?>">
            </div>
            <div class="form-group mb-2">
                <label for="inputPassword2" class="sr-only">Vencimento</label>
                <input type="tel" class="form-control" id="due_date" placeholder="Vencimento" name="due_date" required value="<?=date('d/m/Y',strtotime($moviment->getDueDate()));?>">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="inputPassword2" class="sr-only">Acréscimo</label>
                <select name="type" id="">
                    <option value="credit" <?=($moviment->getType() == 'credit')?'selected':'';?>>Crédito</option>
                    <option value="debit" <?=($moviment->getType() == 'debit')?'selected':'';?>>Débito</option>
                </select>
            </div>
            <input type="hidden" value="<?=$moviment->getId();?>" name="id">
            <button type="submit" class="btn btn-primary mb-2">Atualizar</button>
        </form>
    </div>
</div>