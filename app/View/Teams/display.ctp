<?php echo $this->Html->css('style_display'); ?>
<div class="background-display" ng-controller="DisplayCtrl" ng-class="state">
    <div class="bite container-fluid">
        <!--  Equipes  -->
        <div class="row text-center">
            <!-- Anges -->
            <div class="col-xs-4 col-xs-offset-1">
                <!-- Nom de l'équipe -->
                <div class="row">
                    <div class="col-xs-12">
                        <h1>{{teams[0].Team.name}}</h1>
                    </div>
                </div>
                <!-- well -->
                <div class="row well">
                    <div class="col-xs-12">
                        <!-- Score de l'équipe -->
                        <div class="row">
                            <div class="col-xs-12">
                                <h1>{{teams[0].Team.points}}</h1>
                            </div>
                        </div><!-- endScore -->
                    </div><!-- col -->
                </div><!--row -->
            </div><!-- col -->

            <!-- VS -->
            <div class="col-xs-2">
                <h1>VS</h1>
            </div>

            <!-- Démons -->
            <div class="col-xs-4">
                <!-- Nom de l'équipe -->
                <div class="row">
                    <div class="col-xs-12">
                        <h1>{{teams[1].Team.name}}</h1>
                    </div>
                </div>
                <!-- well -->
                <div class="row well">
                    <!-- Score de l'équipe -->
                    <div class="col-xs-12">
                        <h1>{{teams[1].Team.points}}</h1>
                    </div>
                </div>
            </div><!-- col -->
        </div><!-- row -->

        <!-- Graphe des points -->
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 well">
                <highchart id="chart1" config="chartConfig"></highchart>
            </div>
        </div>

        <!-- Compte à rebours -->
        <div class="row">
            <div class="col-xs-12">
            <!-- Timer -->
                    <timer interval="1000" countdown="purgaboire" finish-callback="callbackTimer()">
                        <!-- Chiffres -->
                        <div class="row">
                            <div class="col-xs-4 col-xs-offset-4 well text-center">
                                <h1>{{mminutes}}:{{sseconds}}</h1>
                            </div>
                        </div>
                        <!-- Barre de progression -->
                        <div class="row">
                            <div class="col-xs-10 col-xs-offset-1">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{ (3600 - (minutes*60 + seconds))/3600 * 100 }}%">
                                           {{ (3600 - (minutes*60 + seconds))/3600 * 100 | number:0 }}%
                                    </div>
                                </div>
                                <div ng-show="isKiss" class="text-center"><h1>C'EST L'HEURE DU PURGABOIRE !!!</h1></div>
                            </div>
                        </div>
                    </timer>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 image-footer" ng-show="!isHeaven">
            <!-- <?= $this->Html->image('fire.jpg', array('alt'=>'feu')); ?> -->
        </div>
    </div>
    <div class="footer row">
        <div class="col-xs-12">

        </div>
    </div>
</div>