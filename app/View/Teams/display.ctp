<?php echo $this->Html->css('style_display'); ?>
<div class="background-display" ng-controller="DisplayCtrl">
    <div class="container-fluid">
        <!--  Equipes  -->
        <div class="text-center row" ng-repeat="teams_row in teams | pmkr.partition:4">
            <!--  -->
            <div class="block-team" ng-repeat="team in teams_row"  ng-class="colDisposition[team.Team.position]">
                <!-- Score de l'équipe -->
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="points textshadow">{{team.Team.points}}</h1>
                        <h1 class="team-name textshadow">{{team.Team.name}}</h1>
                    </div>
                </div><!-- endScore -->
            </div><!-- col -->
        </div><!-- row -->

        <!-- Graphe des points -->
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 chart">
                <highchart id="chart1" config="chartConfig"></highchart>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="row">
            <div class="col-xs-12 text-right">
                Created by DevTeam. Support us by making good parties!
            </div>
        </div>
    </div>
</div>