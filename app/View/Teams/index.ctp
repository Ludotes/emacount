<div class="row">
    <div class="col-xs-12">
        <h1>Liste des équipes</h1>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
	<table class="table table-striped table-bordered table-hover">
                	<thead>
                	<tr>
                                	<th><?php echo $this->Paginator->sort('name', 'Nom de l\'équipe'); ?></th>
                                	<th><?php echo $this->Paginator->sort('points', 'Nombre de points'); ?></th>
                                	<th class="actions"><?php echo __('Actions'); ?></th>
                	</tr>
                	</thead>

                	<tbody>
                	<?php foreach ($teams as $team): ?>
                    	<tr>
                    		<td><strong><?php echo h($team['Team']['name']); ?>&nbsp;</strong></td>
                    		<td><?php echo h($team['Team']['points']); ?>&nbsp;</td>
                    		<td>
                    			<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $team['Team']['id']),array(
                                                                'class' => 'btn btn-info')); ?>
                    			<?php echo $this->Form->postLink(__('Supprimer'), array('action' => 'delete', $team['Team']['id']),array(
                                                                'class' => 'btn btn-danger')) ?>
                    		</td>
                    	</tr>
                    <?php endforeach; ?>
                	</tbody>
	</table>
    </div><!-- col -->
</div><!-- row -->
