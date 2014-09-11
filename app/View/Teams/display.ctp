<?php echo $this->Html->css('style_display'); ?>
<div class="background-display" ng-controller="DisplayCtrl">
    <div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 text-center"><h1>Soirée BDS</h1></div>
    </div>
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
    <div class="row footer">
        <div class="col-xs-12 text-right">
            <p>Created by the DevTeam of Mines d'Alès. Support us by making good parties!</p>
            <p>You can also send us an <a href="mailto:ludovic@sintes.com">email</a> or <a href="https://github.com/DJRanium/emacount">contribute to the projet.</a></p>
        </div>
    </div>
</div>