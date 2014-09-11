<?php echo $this->Html->css('style_admin'); ?>
<div class="row admin" ng-controller="AdminCtrl">
    <div ng-repeat="team in teams">
        <div class="col-xs-6 well well-team">
            <!-- Nom et score de l'équipe -->
            <div class="row">
                <div class="col-xs-12 text-center">
                    <p><h1>{{ team.Team.name }} - {{ team.Team.points }} points</h1></p>
                </div>
            </div>

            <!-- Boutons + et - -->
            <div class="row">
                <div class="col-xs-2 col-xs-offset-4">
                    <button class="btn btn-success btn-block" ng-click="managePoints(team.Team.id, 'a',1)">+</button>
                </div>
                <div class="col-xs-2">
                    <button class="btn btn-danger btn-block" ng-click="managePoints(team.Team.id, 'r',1)">-</button>
                </div>
            </div>
            <br />

            <!-- Boutons personnalisés -->
            <div class="row">
                <div class="col-xs-9">
                    <button class="btn btn-block btn-warning" ng-click="managePoints(team.Team.id,'a',1)"><h2>Bière (+1)</h2></button>
                </div>
                <div class="col-xs-3">
                    <button class="btn btn-block btn-warning" ng-click="managePoints(team.Team.id,'r',1)"><h3><span class="glyphicon glyphicon-remove"></span></h3></button>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-xs-9">
                    <button class="btn btn-block btn-info" ng-click="managePoints(team.Team.id,'a',1)"><h2>2 Shooter (+1)</h2></button>
                </div>
                <div class="col-xs-3">
                    <button class="btn btn-block btn-info" ng-click="managePoints(team.Team.id,'r',1)"><h3><span class="glyphicon glyphicon-remove"></span></h3></button>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-xs-9">
                    <button class="btn btn-block btn-danger" ng-click="managePoints(team.Team.id,'a',5)"><h2>Bière cul-sec (+5)</h2></button>
                </div>
                <div class="col-xs-3">
                    <button class="btn btn-block btn-danger" ng-click="managePoints(team.Team.id,'r',5)"><h3><span class="glyphicon glyphicon-remove"></span></h3></button>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-xs-9">
                    <button class="btn btn-block btn-success" ng-click="managePoints(team.Team.id,'a',10)"><h2>Défi (+10)</h2></button>
                </div>
                <div class="col-xs-3">
                    <button class="btn btn-block btn-success" ng-click="managePoints(team.Team.id,'r',10)"><h3><span class="glyphicon glyphicon-remove"></span></h3></button>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-xs-9">
                    <button class="btn btn-block btn-primary" ng-click="managePoints(team.Team.id,'a',10)"><h2>Déguisement (+10)</h2></button>
                </div>
                <div class="col-xs-3">
                    <button class="btn btn-block btn-primary" ng-click="managePoints(team.Team.id,'r',10)"><h3><span class="glyphicon glyphicon-remove"></span></h3></button>
                </div>
            </div>
            <br/>
        </div>
    </div>
</div>