<div class="row">
    <div class="col-sm-12">
        <h1>Movimentação</h1>
    </div>
</div>
<div class="row">
<div class="col-sm-6">
        <div class="row">
            <div class="col-sm-6">
                <select name="year" id="year" onchange="updateLoadMoviments(this);">
                    <option value="2020">2020</option>
                </select>
                <select name="month" id="month" onchange="updateLoadMoviments(this);">
                    <?php $n = 1;?>
                    <?php foreach($months as $m):?>
                        <option value="<?=$n;?>"><?=$m;?></option>
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