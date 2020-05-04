<?php require 'partials/doctype.php';?>
<div class="container">
  <div class="row">
    <div class="col-sm">
     
    </div>
    <div class="col-sm">
        <img src="<?=BASE_IMAGES;?>logo_aleevolucoes.png" alt="" class="img-fluid" style="padding:10px; width:100%">
        <h1 class="text-center">Acesso</h1>
        <p class="text-center"><?=$site->getName();?></p>
        <form method="POST" action="<?=BASE;?>login/signin">
            <?php if(!empty($flash)):?>
            <div class="alert alert-danger" role="alert">
                <?=$flash;?>
            </div>
            <?php endif;?>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required autofocus>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Senha</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Acessar</button>
        </form>
    </div>
    <div class="col-sm">
     
    </div>
  </div>
</div>
<?php require 'partials/footer.php';?>