<?php
/**
 * Layout des pages d'administration
 */
?>
<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        EMACount - Administration
    </title>
    <?php
        echo $this->Html->css('bootstrap.min');
        echo $this->Html->meta('icon');
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
</head>
<body ng-app="EmacountApp">
    <?php echo $this->Session->flash(); ?>
    <!-- Navbar -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand">Emacount - Admin</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?= $this->Html->url(array(
                        'controller' => 'teams',
                        'action' => 'admin'));?>"><span class="glyphicon glyphicon-euro"></span> Gestion des ventes </a></li>

                    <li><a href="<?= $this->Html->url(array(
                        'controller' => 'teams',
                        'action' => 'add'));?>"><span class="glyphicon glyphicon-plus"></span> Ajouter une équipe </a></li>

                    <li><a href="<?= $this->Html->url(array(
                        'controller' => 'teams',
                        'action' => 'index'));?>"><span class="glyphicon glyphicon-th-list"></span> Gestion des équipes </a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?= $this->Html->url(array(
                        'controller' => 'teams',
                        'action' => 'display'));?>"><span class="glyphicon glyphicon-eye-open"></span> Voir l'affichage !</a></li>
                  </ul>
            </div>
        </div>
    </nav>

    <!-- Contenu -->
    <div class="container">
        <?php echo $this->fetch('content'); ?>
    </div>

<!-- Scripts -->
    <!-- Script de récupération d'url -->
    <script type="text/javascript">
        var urlGetTeamsJSON = "<?= $this->Html->url(array(
            "controller" => "teams",
            "action" => "getTeamsJSON")); ?>";

        var urlManagePoints = "<?= $this->Html->url(array(
            "controller" => "teams",
            "action" => "managePoint")); ?>";

    </script>
    <!-- Components -->
    <?php echo $this->Html->script('components/jquery.min'); ?>
    <?php echo $this->Html->script('components/angular.min'); ?>
    <?php echo $this->Html->script('components/angular-timer.min'); ?>
    <?php echo $this->Html->script('components/bootstrap.min'); ?>
    <?php echo $this->Html->script('components/highcharts'); ?>
    <?php echo $this->Html->script('components/highcharts-ng.min'); ?>
    <!-- App -->
    <?php echo $this->Html->script('app'); ?>
    <!-- Controllers -->
     <?php echo $this->Html->script('controllers/admin_ctrl'); ?>
    <!-- Factories -->
    <?php echo $this->Html->script('factories/memoize'); ?>
    <?php echo $this->Html->script('factories/filter-stabilize'); ?>
    <?php echo $this->Html->script('factories/teams_factory'); ?>
    <?php echo $this->Html->script('factories/admin_factory'); ?>
    <!-- Filters -->
    <?php echo $this->Html->script('filters/partition.js');?>
</body>
</html>
