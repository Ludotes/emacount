<?php echo $this->Html->css('style_display'); ?>
<div class="background-display" ng-controller="DisplayCtrl">
    <div class="container-fluid">
        <!--  Equipes  -->
        <div class="row text-center">
            <!--  -->
            <div class="col-xs-3 block-team well" ng-repeat="team in teams">
                <!-- well -->
                <div class="row well-team">
                    <div class="col-xs-12">
                        <!-- Score de l'équipe -->
                        <div class="row">
                            <div class="col-xs-12">
                                <h1 class="points textshadow">{{team.Team.points}}</h1>
                                <h1 class="team-name textshadowlight">{{team.Team.name}}</h1>
                            </div>
                        </div><!-- endScore -->
                    </div><!-- col -->
                </div><!--row -->
            </div><!-- col -->
        </div><!-- row -->

        <!-- Graphe des points -->
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 chart">
                <highchart id="chart1" config="chartConfig"></highchart>
            </div>
        </div>
    </div>
    <div class="footer"></div>
</div>