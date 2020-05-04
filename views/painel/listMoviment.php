<div class="row">
    <div class="col-sm-12">
        <p><strong>Mês:</strong> <?=$currentMonth;?> de <?=$year;?></p>
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
                <?php
                    if(!empty($moviment->getPaymentDate())){
                        $css = 'bg-success text-white';
                    }elseif($moviment->getType() == 'credit'){
                        $css = 'bg-primary text-white';
                    }else{
                        $css = 'bg-danger text-white';
                    }
                ?>
            <tr class="<?=$css?>">
                <th scope="row"><?=$n;?></th>
                <td><?=$moviment->getName();?></td>
                <td><?=date('d/m/Y', strtotime($moviment->getDueDate()));?></td>
                <td><?=$moviment->getType();?></td>
                <td><?=number_format($moviment->getPrice(),2,',','');?></td>
                <td><?=number_format($moviment->getDesccount(),2,',','');?></td>
                <td><?=number_format($moviment->getAddition(),2,',','');?></td>
                <td><?=number_format($moviment->getPrice()-$moviment->getDesccount()+$moviment->getAddition(),2,',','');?></td>
                <td>
                    <?php if(!empty($moviment->getPaymentDate())):?>
                        <button class="btn btn-secondary">Pago - <?=date('d/m/Y',strtotime($moviment->getPaymentDate()));?></button>
                    <?php else:?>
                        <a href="javascript:;" class="btn btn-primary bt-consolidar" data-toggle="modal"  data-target="#exampleModal" data-id="<?=$moviment->getId();?>">Consolidar</a>
                    <?php endif;?>
                </td>
                <td>
                    <a href="" class="btn btn-primary bt-edit" data-toggle="modal"  data-target="#exampleModal" data-id="<?=$moviment->getId();?>">Editar</a>
                    <a href="<?=BASE;?>painel_movimentacao/delAction/<?=$moviment->getId();?>" class="btn btn-primary" onclick="return confirm('Deseja realemente excluir?');">Excluir</a>
                </td>
            </tr>
            <?php $n++;?>
            <?php endforeach;?>
        </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
