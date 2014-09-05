<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
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
<body>
	<div class="container" ng-app="EmacountApp">
                	<?php echo $this->Session->flash(); ?>
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
    <!-- App -->
    <?php echo $this->Html->script('app'); ?>
    <!-- Controllers -->
     <?php echo $this->Html->script('controllers/admin_ctrl'); ?>
     <?php echo $this->Html->script('controllers/display_ctrl'); ?>
    <!-- Factories -->
    <?php echo $this->Html->script('factories/teams_factory'); ?>
    <?php echo $this->Html->script('factories/admin_factory'); ?>
</body>
</html>
