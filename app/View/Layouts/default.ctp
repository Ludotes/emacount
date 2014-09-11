<!DOCTYPE html>
<?php
/**
 * Layout de l'affichage des scores
 */
?>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
                    EMACount
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
        	<?php echo $this->fetch('content'); ?>

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
     <?php echo $this->Html->script('controllers/display_ctrl'); ?>
    <!-- Factories -->
    <?php echo $this->Html->script('factories/memoize'); ?>
    <?php echo $this->Html->script('factories/filter-stabilize'); ?>
    <?php echo $this->Html->script('factories/teams_factory'); ?>
    <?php echo $this->Html->script('factories/admin_factory'); ?>
    <!-- Filters -->
    <?php echo $this->Html->script('filters/partition.js');?>
</body>
</html>
