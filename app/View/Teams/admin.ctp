<div class="row">
    <div class="col-xs-12">
        <h1>Administration d'EMACOUNT</h1>
    </div>
</div>

<div class="row" ng-controller="AdminCtrl">
    <div ng-repeat="team in teams"
        <div class="col-xs-6 well">
            <h3>{{ team.Team.name }}</h3><h5>Score : <span ng-model=""></span>{{ team.Team.points }}</h5><button class="btn btn-success" ng-click="managePoints(1, 'a')">+</button> <button class="btn btn-danger" ng-click="managePoints(1, 'r')">-</button>
        </div>
    </div>
</div>