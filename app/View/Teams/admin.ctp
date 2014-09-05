<div class="row">
    <div class="col-xs-12">
        <h1>Administration d'EMACOUNT</h1>
    </div>
</div>

<div class="row" ng-controller="AdminCtrl">
    <div ng-repeat="team in teams">
        <div class="col-xs-6 well">
            <h3>{{ team.Team.name }}</h3><h5>Score :    {{ team.Team.points }}</h5><button class="btn btn-success" ng-click="managePoints(team.Team.id, 'a')">+</button> <button class="btn btn-danger" ng-click="managePoints(team.Team.id, 'r')">-</button>
        </div>
    </div>
</div>