<div class="row">
    <div class="col-sm-12">
        <h3>Confirma Pagamento</h3>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <form class="form-inline" action="<?=BASE;?>painel_movimentacao/storageConsolidar" method="post">
            <div class="form-group mb-2">
                <label for="inputPassword2" class="sr-only">Data Pagamento</label>
                <input type="tel" class="form-control data" id="payment_date" placeholder="Data Pagamento" name="payment_date" required>
            </div>
            <input type="hidden" value="<?=$moviment->getId();?>" name="id">
            <button type="submit" class="btn btn-primary mb-2">Confirmar</button>
        </form>
    </div>
</div>
<script src="https://unpkg.com/imask"></script>
<script type="text/javascript">
    let data = document.querySelectorAll('.data'), d;

    for(d=0;d<data.length;d++) {
        IMask(data[d],{
            mask: '00/00/0000'
        });
    }
</script>