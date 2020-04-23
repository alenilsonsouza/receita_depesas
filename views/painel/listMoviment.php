<div class="row">
    <div class="col-sm-12">
        <p><strong>Mês:</strong> <?=$currentMonth;?></p>
    </div>
    <div class="col-sm-12">
        <?php foreach($months as $m):?>
            <button class="bagde badge-pill badge-primary month"><?=$m;?></button>
        <?php endforeach;?>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <p class="text-center"><strong>Despesas: <?=number_format($expensesTotal,2,',','.');?></strong></p>
        <div class="row">
            <div class="col-sm-6 badge badge-success"><?=number_format($expensesTotalPaid,2,',','.');?></div>
            <div class="col-sm-6 badge badge-danger"><?=number_format($expensesTotalNoPaid,2,',','.');?></div>
        </div>
    </div>
    <div class="col-sm-3">
        <p class="text-center"><strong>Receitas: <?=number_format($recipesTotal,2,',','.');?></strong></p>
        <div class="row">
            <div class="col-sm-6 badge badge-success"><?=number_format($recipesTotalPaid,2,',','.');?></div>
            <div class="col-sm-6 badge badge-danger"><?=number_format($recipesTotalNoPaid,2,',','.');?></div>
        </div>
    </div>
    <div class="col-sm-3">
        <p class="text-center"><strong>Total Descontos: <?=number_format($desccountTotal,2,',','.');?></strong></p>
        <div class="row">
            <div class="col-sm-6 badge badge-success"><?=number_format($desccountTotalPaid,2,',','.');?></div>
            <div class="col-sm-6 badge badge-danger"><?=number_format($desccountTotalNoPaid,2,',','.');?></div>
        </div>
    </div>
    <div class="col-sm-3">
        <p class="text-center"><strong>Total Acréscimos: <?=number_format($additionTotal,2,',','.');?></strong></p>
        <div class="row">
            <div class="col-sm-6 badge badge-success"><?=number_format($additionTotalPaid,2,',','.');?></div>
            <div class="col-sm-6 badge badge-danger"><?=number_format($additionTotalNoPaid,2,',','.');?></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Vencimento</th>
                <th scope="col">Tipo</th>
                <th scope="col">Preço</th>
                <th scope="col">Desconto</th>
                <th scope="col">Acréscimo</th>
                <th scope="col">Subtotal</th>
                <th scope="col">Consolidado?</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php $n = 1;?>
            <?php foreach($moviments as $moviment):?>
            <tr>
                <th scope="row"><?=$n;?></th>
                <td><?=$moviment->getName();?></td>
                <td><?=date('d/m/Y', strtotime($moviment->getDueDate()));?></td>
                <td><?=$moviment->getType();?></td>
                <td><?=number_format($moviment->getPrice(),2,',','');?></td>
                <td><?=number_format($moviment->getDesccount(),2,',','');?></td>
                <td><?=number_format($moviment->getAddition(),2,',','');?></td>
                <td><?=number_format($moviment->getPrice()-$moviment->getDesccount()+$moviment->getAddition(),2,',','');?></td>
                <td><?php echo $moviment->getNamePaid();?></td>
                <td>
                    <a href="" class="btn btn-primary">Editar</a>
                    <a href="" class="btn btn-primary">Excluir</a>
                </td>
            </tr>
            <?php $n++;?>
            <?php endforeach;?>
        </tbody>
        </table>
    </div>
</div>