<?php echo $this->Html->css('style_display'); ?>
<div class="background-display" ng-controller="DisplayCtrl" ng-class="state">
    <div class="container-fluid">
        <!--  Equipes  -->
        <div class="row text-center">
            <!--  -->
            <div class="col-xs-3 block-team" ng-repeat="team in teams">
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

        <!-- Compte à rebours -->
        <div class="row">
            <div class="col-xs-12">
            <!-- Timer -->
                    <timer interval="1000" countdown="purgaboire" finish-callback="callbackTimer()">
                        <!-- Barre de progression -->
                        <div class="row">
                            <div class="col-xs-10 col-xs-offset-1">
                                <div class="progress">
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{ (3600 - (minutes*60 + seconds))/3600 * 100 }}%">
                                               {{ (3600 - (minutes*60 + seconds))/3600 * 100 | number:0 }}%
                                        </div>
                                </div>
                            </div>
                        </div>
                        <!-- Chiffres -->
                        <div class="row">
                                <div class="col-xs-10 col-xs-offset-1 text-center timing">
                                    <h1>{{mminutes}}:{{sseconds}}</h1>
                                    <div ng-show="isKiss" class="text-center"><h1>C'EST L'HEURE DU PURGABOIRE !!!</h1></div>
                                </div>
                        </div>
                    </timer>
            </div>
        </div>

    </div>
    <div class="footer"></div>

    <div class="popup" ng-class="state" ng-show="isKiss">
        <div class="row">
            <div class="col-xs-12 text-center pop-title">
                <p>C'est l'heure du <strong>PURGABOIRE !</strong></p>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6 col-xs-offset-1">
                <?= $this->Html->image('angel.jpg', array('alt' => 'angel', 'ng-show' => 'isHeaven', 'class' =>'img-pop img-responsive')); ?>
                <?= $this->Html->image('devil.jpg', array('alt' => 'devil', 'ng-show' => '!isHeaven','class' =>'img-pop img-responsive')); ?>
            </div>
            <div class="col-xs-5">
                <p><br/><br/><br/>La team des <span ng-show="isHeaven">Anges</span><span ng-show="!isHeaven">Démons</span> a gagné cette heure-ci ! C'EST L'HEURE DE LA BEUVERIE !</p>
            </div>
        </div>
        <button class="btn btn-warning" ng-click="isKiss=false">Close</button>
    </div>
</div>