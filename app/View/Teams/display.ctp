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
            <h1>
                <timer interval="1000" countdown="3" finish-callback="callbackTimer()">
                    <div class="progress">
                        <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{ (3 - (minutes*60 + seconds))/3 * 100 }}%">
                               <span class="sr-only">Progress bar</span>
                        </div>
                    </div>{{minutes}}:{{seconds}}
                </timer>
            </h1>
        </div>
    </div>
    <button
    <a class="btn btn-success" href=".">Refresh</a>
</div>