<div class="row">
    <div class="col-sm-12">
        <h1>Movimentação</h1>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <form class="form-inline" action="<?=BASE;?>painel_movimentacao/storageAddAction" method="post">
            <div class="form-group mb-2">
                <label for="staticEmail2" class="sr-only">Email</label>
                <input type="text" class="form-control" id="name" placeholder="Nome" name="name" required>
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="inputPassword2" class="sr-only">Valor</label>
                <input type="tel" class="form-control valor" id="price" placeholder="Valor" name="price" required>
            </div>
            <div class="form-group mb-2">
                <label for="inputPassword2" class="sr-only">Desconto</label>
                <input type="tel" class="form-control valor" id="desccount" placeholder="Desconto" name="desccount">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="inputPassword2" class="sr-only">Acréscimo</label>
                <input type="tel" class="form-control valor" id="addition" placeholder="Acréscimo" name="addition">
            </div>
            <div class="form-group mb-2">
                <label for="inputPassword2" class="sr-only">Vencimento</label>
                <input type="tel" class="form-control data" id="due_date" placeholder="Vencimento" name="due_date" required>
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="inputPassword2" class="sr-only">Acréscimo</label>
                <select name="type" id="">
                    <option value="credit">Crédito</option>
                    <option value="debit">Débito</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mb-2">OK</button>
        </form>
    </div>
</div>
<div class="row">  
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-6">
                <select name="year" id="year">
                    <?php foreach($years as $y):?>
                        <option value="<?=$y;?>" <?=($y == $year)?'selected':'';?>><?=$y;?></option>
                    <?php endforeach;?>
                </select>
                <select name="month" id="month">
                    <?php $n = 1;?>
                    <?php foreach($months as $m):?>
                        <option value="<?=$n;?>" <?=($n == $month)?'selected':'';?>><?=$m;?></option>
                        <?php $n++;?>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="col-sm-6">
                
            </div>
        </div>
    </div>
</div>
<div id="moviments"></div>

