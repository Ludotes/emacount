<div class="row">
    <div class="col-xs-12">
        <h1> EMACOUNT ! </h1>
    </div>
</div>
<!-- Equipes et scores -->
<div class="row">
    <?php foreach ($teams as $team): ?>
        <div class="col-xs-6 well">
            <div class="row">
                <!-- Nom de l'équipe -->
                <div class="col-xs-12">
                    <h3><?= $team['Team']['name'] ?></h3>
                </div>
            </div>
            <div class="row">
                <!-- Score de l'équipe -->
                <div class="col-xs-12">
                    <h3><?= $team['Team']['points'] ?></h3>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
<a class="btn btn-success" href=".">Refresh</a>