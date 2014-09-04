<div ng-controller="DisplayCtrl">
    <div class="row">
        <div class="col-xs-12">
            <h1> EMACOUNT ! </h1>
        </div>
    </div>
    <!-- Equipes et scores -->
    <div class="row">
        <div ng-repeat="team in teams">
                <div class="col-xs-6 well">
                    <div class="row">
                        <!-- Nom de l'équipe -->
                        <div class="col-xs-12">
                            <h3>{{team.Team.name}}</h3>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Score de l'équipe -->
                        <div class="col-xs-12">
                            <h3>{{team.Team.points}}</h3>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <!-- Compte à rebours -->
    <div class="row">
        <div class="col-xs-12">
            <h1><timer interval="1000" countdown="3599" finish-callback="test()">{{minutes}}:{{seconds}}</timer></h1>
        </div>
    </div>
    <button
    <a class="btn btn-success" href=".">Refresh</a>
</div>