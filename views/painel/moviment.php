<div class="row">
    <div class="col-sm-12">
        <h1>Movimentação</h1>
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