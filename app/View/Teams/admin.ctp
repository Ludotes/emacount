<div class="row">
    <div class="col-xs-12">
        <h1>Administration d'EMACOUNT</h1>
    </div>
</div>

<div class="row">
    <?php foreach ($teams as $team): ?>
        <div class="col-xs-6 well">
            <h3><?= $team['Team']['name'] ?></h3><h5>Score : <?= $team['Team']['points'] ?></h5><a href='.' class="btn btn-success">+</a> <a href='.' class="btn btn-danger">-</a>
        </div>
    <?php endforeach ?>
</div>